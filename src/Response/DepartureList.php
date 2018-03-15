<?php

namespace JdPowered\Geofox\Response;

use JdPowered\Geofox\Data;
use JdPowered\Geofox\Enum\FilterServiceType;
use JdPowered\Geofox\Enum\Set;
use JdPowered\Geofox\Objects\Departure;
use JdPowered\Geofox\Objects\FilterEntry;
use JdPowered\Geofox\Objects\GtiTime;

class DepartureList extends Base
{
    /**
     * @var \JdPowered\Geofox\Objects\GtiTime
     */
    protected $time;

    /**
     * @var \JdPowered\Geofox\Objects\Departure[]
     */
    protected $departures;

    /**
     * @var \JdPowered\Geofox\Objects\FilterEntry[]
     */
    protected $filter;

    /**
     * @var \JdPowered\Geofox\Enum\Set
     */
    protected $serviceTypes;

    /**
     * Create a new instance and fill it from a JSON object.
     *
     * @param int $statusCode
     * @param \JdPowered\Geofox\Data $data
     */
    public function __construct(int $statusCode, Data $data)
    {
        parent::__construct($statusCode, $data);

//        $this->setStations($data->stations);
    }

    /**
     * Get time.
     *
     * @return \JdPowered\Geofox\Objects\GtiTime
     */
    public function getTime(): GtiTime
    {
        return $this->time;
    }

    /**
     * @param \JdPowered\Geofox\Objects\GtiTime $time
     * @return \JdPowered\Geofox\Response\DepartureList
     */
    protected function setTime(GtiTime $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get departures.
     *
     * @return \JdPowered\Geofox\Objects\Departure[]
     */
    public function getDepartures(): array
    {
        return $this->departures ?? [];
    }

    /**
     * Set departures.
     *
     * @param \JdPowered\Geofox\Objects\Departure[]|null $departures
     * @return \JdPowered\Geofox\Response\DepartureList
     */
    protected function setDepartures(?array $departures): self
    {
        $this->departures = array_map(function (Data $departure) {
            return new Departure($departure);
        }, $departures);

        return $this;
    }

    /**
     * Get filter.
     *
     * @return \JdPowered\Geofox\Objects\FilterEntry[]
     */
    public function getFilter(): array
    {
        return $this->filter ?? [];
    }

    /**
     * Set filter.
     *
     * @param \JdPowered\Geofox\Objects\FilterEntry[]|null $filters
     * @return \JdPowered\Geofox\Response\DepartureList
     */
    protected function setFilter(?array $filters): self
    {
        $this->filter = array_map(function (Data $filter) {
            return new FilterEntry($filter);
        }, $filters);

        return $this;
    }

    /**
     * Get service types.
     *
     * @return \JdPowered\Geofox\Enum\Set
     */
    public function getServiceTypes(): Set
    {
        return $this->serviceTypes ?? new Set(FilterServiceType::class);
    }

    /**
     * Set service types.
     *
     * @param array|null $serviceTypes
     * @return \JdPowered\Geofox\Response\DepartureList
     */
    protected function setServiceTypes(?array $serviceTypes = []): self
    {
        $this->serviceTypes = new Set(FilterServiceType::class);

        foreach ($serviceTypes as $serviceType) {
            $this->serviceTypes->attach(FilterServiceType::get($serviceType));
        }

        return $this;
    }
}
