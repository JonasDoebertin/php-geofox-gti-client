<?php


namespace JdPowered\Geofox\Objects;


use JdPowered\Geofox\Json;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class FilterEntry
{
    use MagicGettersSetters;

    /**
     * @var string|null
     */
    protected $serviceId;

    /**
     * @var string[]
     */
    protected $stationIds;

    /**
     * @var string|null
     */
    protected $serviceName;

    /**
     * @var string|null
     */
    protected $label;

    /**
     * Create a new instance (and optionally fill it from a JSON object).
     *
     * @param \JdPowered\Geofox\Json $data
     */
    public function __construct(Json $data = null)
    {
        if (is_null($data)) {
            return;
        }

        $this->setServiceId($data->serviceID)
            ->setStationIds($data->stationIDs)
            ->setServiceName($data->serviceName)
            ->setLabel($data->label);
    }

    /**
     * Get service id.
     *
     * @return null|string
     */
    public function getServiceId(): ?string
    {
        return $this->serviceId;
    }

    /**
     * Set service id.
     *
     * @param null|string $serviceId
     * @return \JdPowered\Geofox\Objects\FilterEntry
     */
    public function setServiceId(?string $serviceId): FilterEntry
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get station ids.
     *
     * @return string[]
     */
    public function getStationIds(): array
    {
        return $this->stationIds ?? [];
    }

    /**
     * Set station ids.
     *
     * @param string[] $stationIds
     * @return \JdPowered\Geofox\Objects\FilterEntry
     */
    public function setStationIds(array $stationIds): FilterEntry
    {
        $this->stationIds = $stationIds;

        return $this;
    }

    /**
     * Get service name.
     *
     * @return null|string
     */
    public function getServiceName(): ?string
    {
        return $this->serviceName;
    }

    /**
     * @param null|string $serviceName
     * @return \JdPowered\Geofox\Objects\FilterEntry
     */
    public function setServiceName(?string $serviceName): FilterEntry
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    /**
     * Get label.
     *
     * @return null|string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Set label.
     *
     * @param null|string $label
     * @return \JdPowered\Geofox\Objects\FilterEntry
     */
    public function setLabel(?string $label): FilterEntry
    {
        $this->label = $label;

        return $this;
    }
}
