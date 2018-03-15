<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Data;

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
     * @param \JdPowered\Geofox\Data $data
     */
    public function __construct(Data $data = null)
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
     * @param \JdPowered\Geofox\Data $arrTime
     * @return JourneySdName
     */
    public function setArrTime(Data $arrTime): self
    {
        $this->arrTime = $arrTime;

        return $this;
    }

    /**
     * Set the departure time.
     *
     * @param \JdPowered\Geofox\Data $depTime
     * @return JourneySdName
     */
    public function setDepTime(Data $depTime): self
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
    public function setPlattform(string $plattform): self
    {
        $this->plattform = $plattform;

        return $this;
    }
}
