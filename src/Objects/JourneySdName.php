<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Json;

class JourneySdName extends SdName
{
    /**
     * @var \JdPowered\Geofox\Objects\GtiTime
     */
    public $arrTime;

    /**
     * @var \JdPowered\Geofox\Objects\GtiTime
     */
    public $depTime;

    /**
     * @var
     */
    public $attributes;

    /**
     * @var string
     */
    public $plattform;

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

        $this->setArrTime($data->arrTime)
            ->setDestTime($data->destTime)
//            ->setAttributes($data->attributes)
            ->setPlattform($data->plattform);
    }

    /**
     * Set the arrival time.
     *
     * @param \JdPowered\Geofox\Json $arrTime
     * @return JourneySdName
     */
    public function setArrTime(Json $arrTime): JourneySdName
    {
        $this->arrTime = $arrTime;

        return $this;
    }

    /**
     * Set the departure time.
     *
     * @param \JdPowered\Geofox\Json $depTime
     * @return JourneySdName
     */
    public function setDepTime(Json $depTime): JourneySdName
    {
        $this->depTime = new GtiTime($depTime);

        return $this;
    }

    /**
     * Set the attributes.
     *
     * @param mixed $attributes
     * @return JourneySdName
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Set the platform.
     *
     * @param string $plattform
     * @return JourneySdName
     */
    public function setPlattform(string $plattform): JourneySdName
    {
        $this->plattform = $plattform;

        return $this;
    }
}
