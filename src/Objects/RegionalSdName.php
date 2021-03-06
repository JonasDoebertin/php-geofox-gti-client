<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Data;

class RegionalSdName extends SdName
{
    /**
     * @var int
     */
    public $distance;

    /**
     * @var int
     */
    public $time;

    /**
     * Create a new instance (and optionally fill it from a JSON object).
     *
     * @param \JdPowered\Geofox\Data $data
     */
    public function __construct(Data $data = null)
    {
        parent::__construct($data);

        if (is_null($data)) {
            return;
        }

        $this->setDistance($data->distance)
            ->setTime($data->time);
    }

    /**
     * Set the distance.
     *
     * @param int $distance
     * @return RegionalSdName
     */
    public function setDistance(int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Set the time.
     *
     * @param int $time
     * @return RegionalSdName
     */
    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }
}
