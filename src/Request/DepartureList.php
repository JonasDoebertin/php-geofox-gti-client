<?php

namespace JdPowered\Geofox\Request;

use JdPowered\Geofox\Enum\CoordinateType;
use JdPowered\Geofox\Enum\ModificationType;
use JdPowered\Geofox\Enum\Set;
use JdPowered\Geofox\Objects\GtiTime;
use JdPowered\Geofox\Objects\SdName;

class DepartureList extends Base
{
    /**
     * @var \JdPowered\Geofox\Objects\SdName|null
     */
    protected $station;

    /**
     * @var \JdPowered\Geofox\Objects\SdName[]
     */
    protected $stations;

    /**
     * @var \JdPowered\Geofox\Objects\GtiTime
     */
    protected $time;

    /**
     * @var int|null
     */
    protected $maxList;

    /**
     * @var int|null
     */
    protected $maxTimeOffset;

    /**
     * @var bool
     */
    protected $allStationsInChangingNode;

    /**
     * @var bool
     */
    protected $returnFilters;

    /**
     * @var \JdPowered\Geofox\Objects\FilterEntry[]
     */
    protected $filter;

    /**
     * @var \JdPowered\Geofox\Objects\ServiceType[]
     */
    protected $serviceTypes;

    /**
     * @var bool
     */
    protected $useRealtime;

    /**
     * Get station.
     *
     * @return \JdPowered\Geofox\Objects\SdName|null
     */
    public function getStation(): ?SdName
    {
        return $this->station;
    }

    /**
     * Set station.
     *
     * @param \JdPowered\Geofox\Objects\SdName $station
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setStation(SdName $station): DepartureList
    {
        $this->station = $station;

        return $this;
    }

    /**
     * Get stations.
     *
     * @return \JdPowered\Geofox\Objects\SdName[]
     */
    public function getStations(): array
    {
        return $this->stations ?? [];
    }

    /**
     * Set stations.
     *
     * @param \JdPowered\Geofox\Objects\SdName[] $stations
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setStations(array $stations): DepartureList
    {
        $this->stations = $stations;

        return $this;
    }

    /**
     * Get time.
     *
     * @return \JdPowered\Geofox\Objects\GtiTime
     */
    public function getTime(): GtiTime
    {
        return $this->time ?? new GtiTime();
    }

    /**
     * Set time.
     *
     * @param \JdPowered\Geofox\Objects\GtiTime $time
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setTime(GtiTime $time): DepartureList
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get max list.
     *
     * @return int|null
     */
    public function getMaxList(): ?int
    {
        return $this->maxList;
    }

    /**
     * Set max list.
     *
     * @param int|null $maxList
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setMaxList(?int $maxList): DepartureList
    {
        $this->maxList = $maxList;

        return $this;
    }

    /**
     * Get max time offset.
     *
     * @return int|null
     */
    public function getMaxTimeOffset(): ?int
    {
        return $this->maxTimeOffset;
    }

    /**
     * Set max time offset.
     *
     * @param int|null $maxTimeOffset
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setMaxTimeOffset(?int $maxTimeOffset): DepartureList
    {
        $this->maxTimeOffset = $maxTimeOffset;

        return $this;
    }

    /**
     * Get all stations in changing node.
     *
     * @return bool
     */
    public function getAllStationsInChangingNode(): bool
    {
        return $this->allStationsInChangingNode;
    }

    /**
     * Set all stations in changing node.
     *
     * @param bool $allStationsInChangingNode
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setAllStationsInChangingNode(bool $allStationsInChangingNode): DepartureList
    {
        $this->allStationsInChangingNode = $allStationsInChangingNode;

        return $this;
    }

    /**
     * Get return filters.
     *
     * @return bool
     */
    public function getReturnFilters(): bool
    {
        return $this->returnFilters;
    }

    /**
     * Set return filters.
     *
     * @param bool $returnFilters
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setReturnFilters(bool $returnFilters): DepartureList
    {
        $this->returnFilters = $returnFilters;

        return $this;
    }

    /**
     * @return \JdPowered\Geofox\Objects\FilterEntry[]
     */
    public function getFilter(): array
    {
        return $this->filter ?? [];
    }

    /**
     * @param \JdPowered\Geofox\Objects\FilterEntry[] $filter
     * @return DepartureList
     */
    public function setFilter(array $filter): DepartureList
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get service types.
     *
     * @return \JdPowered\Geofox\Objects\ServiceType[]
     */
    public function getServiceTypes(): array
    {
        return $this->serviceTypes ?? [];
    }

    /**
     * Set service types.
     *
     * @param \JdPowered\Geofox\Objects\ServiceType[] $serviceTypes
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setServiceTypes(array $serviceTypes): DepartureList
    {
        $this->serviceTypes = $serviceTypes;

        return $this;
    }

    /**
     * Get use realtime.
     *
     * @return bool
     */
    public function getUseRealtime(): bool
    {
        return $this->useRealtime;
    }

    /**
     * Set use realtime.
     *
     * @param bool $useRealtime
     * @return \JdPowered\Geofox\Request\DepartureList
     */
    public function setUseRealtime(bool $useRealtime): DepartureList
    {
        $this->useRealtime = $useRealtime;

        return $this;
    }

    /**
     * Apply default values.
     */
    protected function setDefaults()
    {
        parent::setDefaults();

        $this->setTime(new GtiTime());
        $this->allStationsInChangingNode = false;
        $this->returnFilters = false;
        $this->useRealtime = false;
    }

    /**
     * Build the request body.
     *
     * @return array
     */
    protected function httpBody(): array
    {
        return array_merge(parent::httpBody(), [
//            'station' => ,
//            'stations' => ,
            'time' => $this->getTime()->toArray(),
//            'maxList' => ,
//            'maxTimeOffset' => ,
//            'allStationsInChangingNode' => ,
//            'returnFilters' => ,
//            'filter' => ,
//            'serviceTypes' => $this->getServiceTypes(),
//            'useRealTime' => $this->getUseRealtime(),
        ]);
    }

    /**
     * Build the request URI.
     *
     * @return string
     */
    protected function uri(): string
    {
        return 'departureList';
    }
}
