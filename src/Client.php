<?php

namespace JdPowered\Geofox;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use JdPowered\Geofox\Enum\Platform;
use JdPowered\Geofox\Request\Base as BaseRequest;
use JdPowered\Geofox\Request\Init as InitRequest;
use JdPowered\Geofox\Request\ListStations as ListStationsRequest;
use JdPowered\Geofox\Response\Base as BaseResponse;
use JdPowered\Geofox\Response\Init as InitResponse;
use JdPowered\Geofox\Response\ListStations as ListStationsResponse;
use Psr\Http\Message\RequestInterface;
use Ramsey\Uuid\Uuid;

class Client
{
    /**
     * The Geofox GTI version implemented.
     */
    const API_VERSION = 31;

    /**
     * The timezone the Geofox GTI operates in.
     */
    const API_TIMEZONE = 'Europe/Berlin';

    /**
     * The production api base uri.
     */
    const API_HOST_PRODUCTION = 'https://api.geofox.de/gti/public/';

    /**
     * The test api base uri.
     */
    const API_HOST_TEST = 'https://api-test.geofox.de/gti/public/';

    /**
     * @var string
     */
    protected $applicationId;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var bool
     */
    protected $useTestApi;

    /**
     * @var \JdPowered\Geofox\Enum\Platform
     */
    protected $platform;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * Map requests to their corresponding responses.
     *
     * @var array
     */
    protected $requestResponseMap = [
        InitRequest::class         => InitResponse::class,
        ListStationsRequest::class => ListStationsResponse::class,
    ];

    /**
     * Client constructor.
     *
     * @param string $applicationId
     * @param string $password
     * @param bool $useTestApi
     * @param string $platform
     */
    public function __construct(
        string $applicationId,
        string $password,
        bool $useTestApi = false,
        string $platform = Platform::WEB
    ) {
        $this->applicationId = $applicationId;
        $this->password = $password;
        $this->useTestApi = $useTestApi;
        $this->platform = Platform::get($platform);
    }

    /**
     * Create a listStations request.
     *
     * @return \JdPowered\Geofox\Request\ListStations
     */
    public function listStations()
    {
        return new ListStationsRequest($this);
    }

    /**
     * Execute an api request.
     *
     * @param \JdPowered\Geofox\Request\Base $request
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     * @return \JdPowered\Geofox\Response\Base
     */
    public function fetch(BaseRequest $request): BaseResponse
    {
        $client = $this->client();

        $result = $client->send($request->httpRequest(), $this->requestOptions());

        return new $this->requestResponseMap[get_class($request)](
            $result->getStatusCode(),
            Json::createFromJson($result->getBody())
        );
    }

    /**
     * Get an instance of the http client.
     *
     * @return \GuzzleHttp\Client
     */
    protected function client(): Guzzle
    {
        if (! $this->httpClient) {
            $stack = new HandlerStack();
            $stack->setHandler(\GuzzleHttp\choose_handler());
            $stack->push(Middleware::mapRequest(function (RequestInterface $request) {
                return $request->withHeader(
                    'geofox-auth-signature',
                    $this->generateRequestSignature($request->getBody())
                );
            }));

            $this->httpClient = new Guzzle([
                'handler'  => $stack,
                'base_uri' => $this->useTestApi ? self::API_HOST_TEST : self::API_HOST_PRODUCTION,
            ]);
        }

        return $this->httpClient;
    }

    /**
     * Generate the signature for a given request.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     * @return string
     */
    protected function generateRequestSignature(RequestInterface $request): string
    {
        return base64_encode(hash_hmac('sha1', $request->getBody(), $this->password, true));
    }

    /**
     * Generate default request options.
     *
     * @return array
     */
    protected function requestOptions(): array
    {
        return [
            'headers' => $this->requestHeaders(),
        ];
    }

    /**
     * Generate default request headers.
     *
     * @return array
     */
    protected function requestHeaders(): array
    {
        return [
            'Content-Type'     => 'application/json',
            'Accept-Encoding'  => 'gzip, deflate',
            'Accept'           => 'application/json',
            'geofox-auth-user' => $this->applicationId,
            'geofox-auth-type' => 'HmacSHA1',
            'X-Platform'       => $this->platform->getValue(),
            'X-TraceId'        => Uuid::uuid4(),
        ];
    }
}
