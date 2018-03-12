<?php

namespace JdPowered\Geofox\Test;

use JdPowered\Geofox\Json;

trait GeneratesData
{
    /**
     * @return \JdPowered\Geofox\Json
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     */
    protected function getCoordinateData(): Json
    {
        return Json::createFromJson('{
            "x": 9.93454,
            "y": 53.552405
        }');
    }

    /**
     * @return \JdPowered\Geofox\Json
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     */
    protected function getGtiTimeData(): Json
    {
        return Json::createFromJson('{
            "date": "27.03.2014",
            "time": "18:05"
        }');
    }

    /**
     * @return \JdPowered\Geofox\Json
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     */
    protected function getSdNameData(): Json
    {
        return Json::createFromJson('{
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
