<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Data;
use JdPowered\Geofox\Enum\Set;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class Service
{
    use MagicGettersSetters;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var \JdPowered\Geofox\Objects\ServiceType
     */
    protected $type;

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

        $this->setID($data->id)
            ->setName($data->name)
            ->setDirection($data->direction)
            ->setType(new ServiceType($data->type));
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'        => $this->getId(),
            'name'      => $this->getName(),
            'direction' => $this->getDirection(),
            'type'      => $this->getType()->toArray(),
        ];
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
     * @param null|string $id
     * @return \JdPowered\Geofox\Objects\Service
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

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
     * @param null|string $name
     * @return \JdPowered\Geofox\Objects\Service
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get direction.
     *
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * Set direction.
     *
     * @param null|string $direction
     * @return \JdPowered\Geofox\Objects\Service
     */
    public function setDirection(?string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get type.
     *
     * @return \JdPowered\Geofox\Objects\ServiceType
     */
    public function getType(): ServiceType
    {
        return $this->type ?? new ServiceType();
    }

    /**
     * Set type.
     *
     * @param \JdPowered\Geofox\Objects\ServiceType|null $type
     * @return \JdPowered\Geofox\Objects\Service
     */
    public function setType(?ServiceType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
