<?php

namespace JdPowered\Geofox\Request;

use GuzzleHttp\Psr7\Request as GuzzleRequest;
use JdPowered\Geofox\Client;
use JdPowered\Geofox\Enum\Language;
use JdPowered\Geofox\Traits\MagicGettersSetters;

abstract class Base
{
    use MagicGettersSetters;

    /**
     * @var int
     */
    protected $version;

    /**
     * @var \JdPowered\Geofox\Enum\Language
     */
    protected $language;

    /**
     * @var \JdPowered\Geofox\Client
     */
    protected $client;

    /**
     * Base constructor.
     *
     * @param \JdPowered\Geofox\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->setDefaults();

//        $client->listStations()
//            ->dataReleaseId('21.44.22')
//            ->modificationTypes(Client::MODIFICATION_TYPE_MAIN)
//            ->coordinateType(Client::COORDINATE_TYPE_EPSG_4326)
//            ->filterEquivalent(true)
//            ->get();
    }

    /**
     * Apply default values.
     */
    protected function setDefaults()
    {
        $this->language = Language::DE();
        $this->version = Client::API_VERSION;
    }

    /**
     * Get version.
     *
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Set version.
     *
     * @param int $version
     * @return \JdPowered\Geofox\Request\Base
     */
    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get language.
     *
     * @return \JdPowered\Geofox\Enum\Language
     */
    public function getLanguage(): Language
    {
        return Language::get($this->language);
    }

    /**
     * Set language.
     *
     * @param string $language
     * @return \JdPowered\Geofox\Request\Base
     */
    public function setLanguage(string $language): self
    {
        $this->language = Language::get($language);

        return $this;
    }

    /**
     * Execute the request.
     *
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     * @return \JdPowered\Geofox\Response\Base
     */
    public function get()
    {
        return $this->client->fetch($this);
    }

    /**
     * Create a new HTTP request from this API request.
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    public function httpRequest(): GuzzleRequest
    {
        return new GuzzleRequest('POST', $this->uri(), [], json_encode($this->httpBody()));
    }

    /**
     * Build the request body.
     *
     * @return array
     */
    protected function httpBody(): array
    {
        return [
            'language' => $this->language->getValue(),
            'version'  => $this->version,
        ];
    }

    /**
     * Build the request uri.
     *
     * @return string
     */
    abstract protected function uri(): string;
}
