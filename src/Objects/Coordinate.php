<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Contracts\Arrayable;
use JdPowered\Geofox\Data;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class Coordinate implements Arrayable
{
    use MagicGettersSetters;

    /**
     * @var float
     */
    protected $lng = 0;

    /**
     * @var float
     */
    protected $lat = 0;

    /**
     * Create a new instance (and optionally fill it from a JSON object).
     *
     * @param \JdPowered\Geofox\Data $data
     */
    public function __construct(Data $data = null)
    {
        if (is_null($data)) {
            return;
        }

        $this->setLng($data->x)
            ->setLat($data->y);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'lat' => $this->getLat(),
            'lng' => $this->getLng(),
        ];
    }

    /**
     * Get latitude.
     *
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * Set a latitude.
     *
     * @param float $lat
     * @return Coordinate
     */
    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * Set longitude.
     *
     * @param float $lng
     * @return Coordinate
     */
    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }
}
