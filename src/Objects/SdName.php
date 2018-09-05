<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Contracts\Arrayable;
use JdPowered\Geofox\Data;
use JdPowered\Geofox\Enum\SdType;
use function JdPowered\Geofox\filterArray;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class SdName implements Arrayable
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
     * @var \JdPowered\Geofox\Objects\Coordinate|null
     */
    protected $coordinate;

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

        $this->setId($data->id)
            ->setType($data->type)
            ->setName($data->name)
            ->setCity($data->city)
            ->setCombinedName($data->combinedName)
            ->setCoordinate(new Coordinate($data->coordinate));
    }

    /**
     * Create a new instance from only an id.
     *
     * @param string $id
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public static function createFromId(string $id): self
    {
        return (new static())->setId($id)->setType(SdType::STATION);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return filterArray([
            'id'           => $this->getId(),
            'type'         => $this->getType() ? $this->getType()->getName() : null,
            'name'         => $this->getName(),
            'city'         => $this->getCity(),
            'combinedName' => $this->getCombinedName(),
            'coordinate'   => $this->getCoordinate()->toArray(),
        ]);
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
     * Set id.
     *
     * @param string|null $id
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

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
     * Set type.
     *
     * @param string $type
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setType(?string $type): self
    {
        $this->type = is_null($type) ? null : SdType::get($type);

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
     * Get city.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set city.
     *
     * @param string|null $city
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

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
     * Set combined name.
     *
     * @param string|null $combinedName
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setCombinedName(?string $combinedName): self
    {
        $this->combinedName = $combinedName;

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

    /**
     * Set coordinates.
     *
     * @param \JdPowered\Geofox\Objects\Coordinate $coordinate
     * @return \JdPowered\Geofox\Objects\SdName
     */
    public function setCoordinate(Coordinate $coordinate): self
    {
        $this->coordinate = $coordinate;

        return $this;
    }
}
