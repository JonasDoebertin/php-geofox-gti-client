<?php

namespace JdPowered\Geofox\Enum;

use MabeEnum\EnumSet as BaseSet;

class Set extends BaseSet
{
    /**
     * Convert a set to its array representation.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->getValues();
    }
}
