<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Data;
use JdPowered\Geofox\Enum\Set;
use JdPowered\Geofox\Enum\VehicleType;

class StationListEntry extends SdName
{
    /**
     * @var array<string>
     */
    protected $shortcuts;

    /**
     * @var array<string>
     */
    protected $aliasses;

    /**
     * @var \JdPowered\Geofox\Enum\Set
     */
    protected $vehicleTypes;

    /**
     * @var bool
     */
    protected $exists;

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

        $this->setShortcuts($data->shortcuts)
            ->setAliasses($data->aliasses)
            ->setVehicleTypes($data->vehicleTypes)
            ->setExists($data->exists);
    }

    /**
     * Set shortcuts.
     *
     * @param array $shortcuts
     * @return StationListEntry
     */
    public function setShortcuts(?array $shortcuts): self
    {
        $this->shortcuts = $shortcuts ?? [];

        return $this;
    }

    /**
     * Get shortcuts.
     *
     * @return array
     */
    public function getShortcuts(): array
    {
        return $this->shortcuts ?? [];
    }

    /**
     * Set aliases.
     *
     * @param array $aliasses
     * @return StationListEntry
     */
    public function setAliasses(?array $aliasses): self
    {
        $this->aliasses = $aliasses ?? [];

        return $this;
    }

    /**
     * Get aliases.
     *
     * @return array
     */
    public function getAliasses(): array
    {
        return $this->aliasses ?? [];
    }

    /**
     * Set vehicle types.
     *
     * @param array $vehicleTypes
     * @return StationListEntry
     */
    public function setVehicleTypes(?array $vehicleTypes): self
    {
        $this->vehicleTypes = new Set(VehicleType::class);

        if (is_array($vehicleTypes)) {
            foreach ($vehicleTypes as $vehicleType) {
                $this->vehicleTypes->attach(VehicleType::get($vehicleType));
            }
        }

        return $this;
    }

    /**
     * Get combined name.
     *
     * @return \JdPowered\Geofox\Enum\Set
     */
    public function getVehicleTypes(): Set
    {
        return $this->vehicleTypes ?? new Set(VehicleType::class);
    }

    /**
     * Set exists.
     *
     * @param bool $exists
     * @return StationListEntry
     */
    public function setExists(?bool $exists = true): self
    {
        $this->exists = $exists ?? true;

        return $this;
    }

    /**
     * Get exists.
     *
     * @return bool|null
     */
    public function getExists(): ?bool
    {
        return $this->exists;
    }
}
