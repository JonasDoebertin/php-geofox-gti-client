<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Data;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class Departure
{
    use MagicGettersSetters;

    /**
     * @var \JdPowered\Geofox\Objects\Service
     */
    protected $line;

    /**
     * @var int
     */
    protected $timeOffset;

    /**
     * @var \JdPowered\Geofox\Objects\SdName|null
     */
    protected $station;

    /**
     * @var int
     */
    protected $serviceId;

    /**
     * @var string
     */
    protected $platform;

    /**
     * @var int
     */
    protected $delay;

    /**
     * @var bool|null
     */
    protected $extra;

    /**
     * @var bool|null
     */
    protected $cancelled;

    /**
     * @var string|null
     */
    protected $realtimePlatform;

    /**
     * @var \JdPowered\Geofox\Objects\Attribute
     */
    protected $attributes;

    /**
     * Create a new instance (and optionally fill it from a JSON object).
     *
     * @param \JdPowered\Geofox\Data|null $data
     */
    public function __construct(?Data $data = null)
    {
        if (is_null($data)) {
            return;
        }

        // TODO: Set data
    }

    /**
     * Get line.
     *
     * @return \JdPowered\Geofox\Objects\Service
     */
    public function getLine(): Service
    {
        return $this->line ?? new Service();
    }

    /**
     * Set line.
     *
     * @param \JdPowered\Geofox\Objects\Service $line
     * @return \JdPowered\Geofox\Objects\Departure
     */
    protected function setLine(Service $line): self
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Get time offset.
     *
     * @return int|null
     */
    public function getTimeOffset(): ?int
    {
        return $this->timeOffset;
    }

    /**
     * @param int|null $timeOffset
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setTimeOffset(?int $timeOffset): self
    {
        $this->timeOffset = $timeOffset;

        return $this;
    }

    /**
     * Get station.
     *
     * @return \JdPowered\Geofox\Objects\SdName|null
     */
    public function getStation(): ?SdName
    {
        return $this->station;
    }

    /**
     * Check if station is set.
     *
     * @return bool
     */
    public function hasStation(): bool
    {
        return !is_null($this->station);
    }

    /**
     * Set station.
     *
     * @param \JdPowered\Geofox\Objects\SdName|null $station
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setStation(?SdName $station): self
    {
        $this->station = $station;

        return $this;
    }

    /**
     * Get service id.
     *
     * @return int|null
     */
    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    /**
     * Set service id.
     *
     * @param int|null $serviceId
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setServiceId(?int $serviceId): self
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get platform.
     *
     * @return string|null
     */
    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    /**
     * Set platform.
     *
     * @param string|null $platform
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get delay.
     *
     * @return int|null
     */
    public function getDelay(): ?int
    {
        return $this->delay;
    }

    /**
     * Set delay.
     *
     * @param int|null $delay
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setDelay(?int $delay): self
    {
        $this->delay = $delay;

        return $this;
    }

    /**
     * Get extra.
     *
     * @return bool|null
     */
    public function getExtra(): ?bool
    {
        return $this->extra;
    }

    /**
     * Set extra.
     *
     * @param bool|null $extra
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setExtra(?bool $extra): self
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get cancelled.
     *
     * @return bool|null
     */
    public function getCancelled(): ?bool
    {
        return $this->cancelled;
    }

    /**
     * Set cancelled.
     *
     * @param bool|null $cancelled
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setCancelled(?bool $cancelled): self
    {
        $this->cancelled = $cancelled;

        return $this;
    }

    /**
     * Get realtime platform.
     *
     * @return null|string
     */
    public function getRealtimePlatform(): ?string
    {
        return $this->realtimePlatform;
    }

    /**
     * Set realtime platform.
     *
     * @param null|string $realtimePlatform
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setRealtimePlatform(?string $realtimePlatform): self
    {
        $this->realtimePlatform = $realtimePlatform;

        return $this;
    }

    /**
     * Get attributes.
     * @return \JdPowered\Geofox\Objects\Attribute
     */
    public function getAttributes(): Attribute
    {
        return $this->attributes ?? new Attribute();
    }

    /**
     * Set attributes.
     *
     * @param \JdPowered\Geofox\Objects\Attribute $attributes
     * @return \JdPowered\Geofox\Objects\Departure
     */
    public function setAttributes(Attribute $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }
}
