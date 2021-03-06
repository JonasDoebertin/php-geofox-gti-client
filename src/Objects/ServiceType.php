<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Data;
use JdPowered\Geofox\Enum\SimpleServiceType;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class ServiceType
{
    use MagicGettersSetters;

    /**
     * @var \JdPowered\Geofox\Enum\SimpleServiceType|null
     */
    protected $simpleType;

    /**
     * @var string|null
     */
    protected $shortInfo;

    /**
     * @var string|null
     */
    protected $longInfo;

    /**
     * @var string|null
     */
    protected $model;

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

        $this->setSimpleType($data->simpleType)
            ->setShortInfo($data->shortInfo)
            ->setLongInfo($data->longInfo)
            ->setModel($data->model);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'simpleType' => $this->getSimpleType()->getName(),
            'shortInfo'  => $this->getShortInfo(),
            'longInfo'   => $this->getLongInfo(),
            'model'      => $this->getModel(),
        ];
    }

    /**
     * Get simple type.
     *
     * @return \JdPowered\Geofox\Enum\SimpleServiceType|null
     */
    public function getSimpleType(): ?SimpleServiceType
    {
        return $this->simpleType;
    }

    /**
     * Set simple type.
     *
     * @param string|null $simpleType
     * @return \JdPowered\Geofox\Objects\ServiceType
     */
    public function setSimpleType(?string $simpleType): self
    {
        $this->simpleType = ! is_null($simpleType) ? SimpleServiceType::get($simpleType) : null;

        return $this;
    }

    /**
     * Get short info.
     *
     * @return string|null
     */
    public function getShortInfo(): ?string
    {
        return $this->shortInfo;
    }

    /**
     * Set short info.
     *
     * @param string|null $shortInfo
     * @return \JdPowered\Geofox\Objects\ServiceType
     */
    public function setShortInfo(?string $shortInfo): self
    {
        $this->shortInfo = $shortInfo;

        return $this;
    }

    /**
     * Get long info.
     *
     * @return string|null
     */
    public function getLongInfo(): ?string
    {
        return $this->longInfo;
    }

    /**
     * Set long info.
     *
     * @param string|null $longInfo
     * @return \JdPowered\Geofox\Objects\ServiceType
     */
    public function setLongInfo(?string $longInfo): self
    {
        $this->longInfo = $longInfo;

        return $this;
    }

    /**
     * Get model.
     *
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * Set model.
     *
     * @param string|null $model
     * @return \JdPowered\Geofox\Objects\ServiceType
     */
    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }
}
