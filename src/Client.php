<?php

namespace JdPowered\Geofox;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use JdPowered\Geofox\Enum\Platform;
use JdPowered\Geofox\Request\Base as BaseRequest;
use JdPowered\Geofox\Request\DepartureList as DepartureListRequest;
use JdPowered\Geofox\Request\Init as InitRequest;
use JdPowered\Geofox\Request\ListStations as ListStationsRequest;
use JdPowered\Geofox\Response\Base as BaseResponse;
use JdPowered\Geofox\Response\DepartureList as DepartureListResponse;
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
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $host;

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
        InitRequest::class          => InitResponse::class,
        ListStationsRequest::class  => ListStationsResponse::class,
        DepartureListRequest::class => DepartureListResponse::class,
    ];

    /**
     * Client constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $platform
     */
    public function __construct(
        string $username,
        string $password,
        string $host,
        string $platform = Platform::WEB
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->host = $host;
        $this->platform = Platform::get($platform);
    }

    /**
     * Create an init request.
     *
     * @return \JdPowered\Geofox\Request\Init
     */
    public function init()
    {
        return new InitRequest($this);
    }

    /**
     * Create a listStations request.
     *
     * @return \JdPowered\Geofox\Request\ListStations
     */
    public function listStations(): ListStationsRequest
    {
        return new ListStationsRequest($this);
    }

    /**
     * Create a listStations request.
     *
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function departureList(): DepartureListRequest
    {
        return new DepartureListRequest($this);
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
        $result = $this->client()->send($request->httpRequest(), $this->requestOptions());

        return new $this->requestResponseMap[get_class($request)](
            $result->getStatusCode(),
            Data::createFromJson($result->getBody())
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
                    $this->generateRequestSignature($request)
                );
            }));

            $this->httpClient = new Guzzle([
                'handler'  => $stack,
                'base_uri' => $this->host,
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
            'geofox-auth-user' => $this->username,
            'geofox-auth-type' => 'HmacSHA1',
            'X-Platform'       => $this->platform->getValue(),
            'X-TraceId'        => Uuid::uuid4(),
        ];
    }
}
