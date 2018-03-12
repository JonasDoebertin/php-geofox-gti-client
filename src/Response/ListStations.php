<?php

namespace JdPowered\Geofox\Response;

use JdPowered\Geofox\Json;
use JdPowered\Geofox\Objects\StationListEntry;

class ListStations extends Base
{
    /**
     * @var \JdPowered\Geofox\Objects\StationListEntry[]
     */
    protected $stations;

    /**
     * Create a new instance and fill it from a JSON object.
     *
     * @param int $statusCode
     * @param \JdPowered\Geofox\Json $data
     */
    public function __construct(int $statusCode, Json $data)
    {
        parent::__construct($statusCode, $data);

        $this->setStations($data->stations);
    }

    /**
     * Get stations.
     *
     * @return \JdPowered\Geofox\Objects\StationListEntry[]
     */
    public function getStations(): array
    {
        return $this->stations ?? [];
    }

    /**
     * Set stations.
     *
     * @param array $stations
     * @return \JdPowered\Geofox\Response\ListStations
     */
    protected function setStations(array $stations = []): self
    {
        $this->stations = array_map(function (Json $station) {
            return new StationListEntry($station);
        }, $stations);

        return $this;
    }
}
