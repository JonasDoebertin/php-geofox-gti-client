<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Enum\SdType;
use JdPowered\Geofox\Json;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class SdName
{
    use MagicGettersSetters;

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var \JdPowered\Geofox\Enum\SdType|null
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var string|null
     */
    protected $combinedName;

    /**
     * @var \JdPowered\Geofox\Objects\Coordinate
     */
    protected $coordinate;

    /**
     * Create a new instance (and optionally fill it from a JSON object).
     *
     * @param \JdPowered\Geofox\Json|null $data
     */
    public function __construct(?Json $data = null)
    {
        if (is_null($data)) {
            return;
        }

        $this->setId($data->id)
            ->setType($data->type)
            ->setName($data->name)
            ->setCity($data->city)
            ->setCombinedName($data->combinedName)
            ->setCoordinate($data->coordinate);
    }

    /**
     * Set id.
     *
     * @param string|null $id
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setId(?string $id): SdName
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set type.
     *
     * @param string $type
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setType(?string $type): SdName
    {
        $this->type = is_null($type) ? null : SdType::get($type);

        return $this;
    }

    /**
     * Get type.
     *
     * @return \JdPowered\Geofox\Enum\SdType|null
     */
    public function getType(): ?SdType
    {
        return $this->type;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setName(?string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set city.
     *
     * @param string|null $city
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setCity(?string $city): SdName
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set combined name.
     *
     * @param string|null $combinedName
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setCombinedName(?string $combinedName): SdName
    {
        $this->combinedName = $combinedName;

        return $this;
    }

    /**
     * Get combined name.
     *
     * @return string|null
     */
    public function getCombinedName(): ?string
    {
        return $this->combinedName;
    }

    /**
     * Set coordinates.
     *
     * @param \JdPowered\Geofox\Json $coordinate
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setCoordinate(Json $coordinate = null): SdName
    {
        $this->coordinate = new Coordinate($coordinate);

        return $this;
    }

    /**
     * Get coordinates.
     *
     * @return \JdPowered\Geofox\Objects\Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate ?? new Coordinate();
    }
}
