<?php

namespace JdPowered\Geofox\Enum;

use MabeEnum\Enum;

class AnnouncementFilterPlannedType extends Enum
{
    const NO_FILTER = 'NO_FILTER';
    const ONLY_PLANNED = 'ONLY_PLANNED';
    const ONLY_UNPLANNED = 'ONLY_UNPLANNED';
}
