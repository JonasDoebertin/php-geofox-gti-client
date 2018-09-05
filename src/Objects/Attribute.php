<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Contracts\Arrayable;
use JdPowered\Geofox\Data;
use JdPowered\Geofox\Enum\AttributeType;
use JdPowered\Geofox\Enum\Set;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class Attribute implements Arrayable
{
    use MagicGettersSetters;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var \JdPowered\Geofox\Enum\Set
     */
    protected $types;

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

        $this->setValue($data->value)
            ->setTypes($data->types);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'value' => $this->getValue(),
            'types' => $this->getTypes()->toArray(),
        ];
    }

    /**
     * Get value.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Set simple type.
     *
     * @param null|string $value
     * @return \JdPowered\Geofox\Objects\Attribute
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get short info.
     *
     * @return \JdPowered\Geofox\Enum\Set
     */
    public function getTypes(): Set
    {
        return $this->types ?? new Set(AttributeType::class);
    }

    /**
     * Set short info.
     *
     * @param array|null $types
     * @return \JdPowered\Geofox\Objects\Attribute
     */
    public function setTypes(?array $types = []): self
    {
        $this->types = new Set(AttributeType::class);

        foreach ($types as $type) {
            $this->types->attach(AttributeType::get($type));
        }

        return $this;
    }
}
