<?php

namespace JdPowered\Geofox\Enum;

use MabeEnum\EnumSet;

class Set extends EnumSet
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
