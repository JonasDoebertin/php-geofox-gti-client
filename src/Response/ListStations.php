<?php

namespace JdPowered\Geofox\Response;

use JdPowered\Geofox\Data;
use JdPowered\Geofox\Objects\StationListEntry;

class ListStations extends Base
{
    /**
     * @var string
     */
    protected $dataReleaseId;

    /**
     * @var \JdPowered\Geofox\Objects\StationListEntry[]
     */
    protected $stations;

    /**
     * Create a new instance and fill it from a JSON object.
     *
     * @param int $statusCode
     * @param \JdPowered\Geofox\Data $data
     */
    public function __construct(int $statusCode, Data $data)
    {
        parent::__construct($statusCode, $data);

        $this->setDataReleaseId($data->dataReleaseID)
            ->setStations($data->stations);
    }

    /**
     * Get data release id.
     *
     * @return string
     */
    public function getDataReleaseId(): string
    {
        return $this->dataReleaseId;
    }

    /**
     * Set data release id.
     *
     * @param string $dataReleaseId
     * @return \JdPowered\Geofox\Response\ListStations
     */
    protected function setDataReleaseId(string $dataReleaseId): self
    {
        $this->dataReleaseId = $dataReleaseId;

        return $this;
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
     * @param array|null $stations
     * @return \JdPowered\Geofox\Response\ListStations
     */
    protected function setStations(?array $stations): self
    {
        $this->stations = array_map(function (Data $station) {
            return new StationListEntry($station);
        }, $stations ?? []);

        return $this;
    }
}
