<?php

namespace JdPowered\Geofox\Response;

use Cake\Chronos\Chronos;
use Cake\Chronos\Date;
use JdPowered\Geofox\Client;
use JdPowered\Geofox\Data;

class Init extends Base
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $dataId;

    /**
     * @var \Cake\Chronos\Date
     */
    protected $beginOfService;

    /**
     * @var \Cake\Chronos\Date
     */
    protected $endOfService;

    /**
     * @var \Cake\Chronos\Chronos
     */
    protected $buildDateTime;

    /**
     * @var string
     */
    protected $buildText;

    /**
     * Create a new instance and fill it from a JSON object.
     *
     * @param int $statusCode
     * @param \JdPowered\Geofox\Data $data
     */
    public function __construct(int $statusCode, Data $data)
    {
        parent::__construct($statusCode, $data);

        $this->setId($data->id)
            ->setDataId($data->dataId)
            ->setBeginOfService($data->beginOfService)
            ->setEndOfService($data->endOfService)
            ->setBuildDateTime($data->buildDate, $data->buildTime)
            ->setBuildText($data->buildText);
    }

    /**
     * Get id.
     *
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param string|null $id
     * @return \JdPowered\Geofox\Response\Init
     */
    protected function setId(string $id = null): ?self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get data id.
     *
     * @return null|string
     */
    public function getDataId(): ?string
    {
        return $this->dataId;
    }

    /**
     * Set data id.
     *
     * @param string $dataId
     * @return \JdPowered\Geofox\Response\Init
     */
    protected function setDataId(string $dataId = null): self
    {
        $this->dataId = $dataId;

        return $this;
    }

    /**
     * Get begin of service.
     *
     * @return \Cake\Chronos\Date|null
     */
    public function getBeginOfService(): Date
    {
        return $this->beginOfService;
    }

    /**
     * Set begin of service.
     *
     * @param string $beginOfService
     * @return \JdPowered\Geofox\Response\Init
     */
    protected function setBeginOfService(string $beginOfService): self
    {
        $this->beginOfService = Chronos::createFromFormat(
            'd.m.Y',
            $beginOfService,
            Client::API_TIMEZONE);

        return $this;
    }

    /**
     * Get end of service.
     *
     * @return \Cake\Chronos\Date|null
     */
    public function getEndOfService(): Date
    {
        return $this->endOfService;
    }

    /**
     * Set end of service.
     *
     * @param string $endOfService
     * @return \JdPowered\Geofox\Response\Init
     */
    protected function setEndOfService(string $endOfService): self
    {
        $this->endOfService = Chronos::createFromFormat(
            'd.m.Y',
            $endOfService,
            Client::API_TIMEZONE
        );

        return $this;
    }

    /**
     * Get build date and time.
     *
     * @return \Cake\Chronos\Chronos
     */
    public function getBuildDateTime(): Chronos
    {
        return $this->buildDateTime;
    }

    /**
     * Set build date and time.
     *
     * @param string $buildDate
     * @param string $buildTime
     * @return \JdPowered\Geofox\Response\Init
     */
    protected function setBuildDateTime(string $buildDate, string $buildTime): self
    {
        $this->buildDateTime = Chronos::createFromFormat(
            'd.m.Y H:i:s',
            "{$buildDate} {$buildTime}",
            Client::API_TIMEZONE
        );

        return $this;
    }

    /**
     * Get build text.
     *
     * @return string
     */
    public function getBuildText(): string
    {
        return $this->buildText;
    }

    /**
     * Set build text.
     *
     * @param string $buildText
     * @return \JdPowered\Geofox\Response\Init
     */
    protected function setBuildText(string $buildText): self
    {
        $this->buildText = $buildText;

        return $this;
    }
}
