<?php

namespace JdPowered\Geofox\Test;

use JdPowered\Geofox\Data;

trait GeneratesData
{
    /**
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     * @return \JdPowered\Geofox\Data
     */
    protected function getCoordinateData(): Data
    {
        return Data::createFromJson('{
            "x": 9.93454,
            "y": 53.552405
        }');
    }

    /**
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     * @return \JdPowered\Geofox\Data
     */
    protected function getGtiTimeData(): Data
    {
        return Data::createFromJson('{
            "date": "27.03.2014",
            "time": "18:05"
        }');
    }

    /**
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     * @return \JdPowered\Geofox\Data
     */
    protected function getSdNameData(): Data
    {
        return Data::createFromJson('{
            "name": "Altona",
            "id": "Master:80953",
            "type": "STATION",
            "city": "Hamburg",
            "coordinate": {
                "x": 9.93454,
                "y": 53.552405
            }
        }');
    }
}
