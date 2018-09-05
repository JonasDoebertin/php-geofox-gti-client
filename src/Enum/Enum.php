<?php

namespace JdPowered\Geofox\Enum;

use MabeEnum\Enum as BaseEnum;
use MabeEnum\EnumSerializableTrait;
use Serializable;

class Enum extends BaseEnum implements Serializable
{
    use EnumSerializableTrait;
}
