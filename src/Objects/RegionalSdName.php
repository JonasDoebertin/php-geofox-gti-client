<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Json;

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
     * @param \JdPowered\Geofox\Json $data
     */
    public function __construct(Json $data = null)
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
    public function setDistance(int $distance): RegionalSdName
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
    public function setTime(int $time): RegionalSdName
    {
        $this->time = $time;

        return $this;
    }
}
