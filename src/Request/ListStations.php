<?php

namespace JdPowered\Geofox\Request;

use JdPowered\Geofox\Enum\CoordinateType;
use JdPowered\Geofox\Enum\ModificationType;
use JdPowered\Geofox\Enum\Set;

class ListStations extends Base
{
    /**
     * @var string|null
     */
    protected $dataReleaseId;

    /**
     * @var \JdPowered\Geofox\Enum\Set
     */
    protected $modificationTypes;

    /**
     * @var \JdPowered\Geofox\Enum\CoordinateType
     */
    protected $coordinateType;

    /**
     * @var bool
     */
    protected $filterEquivalent;

    /**
     * Get data release id.
     *
     * @return null|string
     */
    public function getDataReleaseId(): ?string
    {
        return $this->dataReleaseId;
    }

    /**
     * Set data release id.
     *
     * @param string $dataReleaseId
     * @return \JdPowered\Geofox\Request\ListStations
     */
    public function setDataReleaseId(string $dataReleaseId): self
    {
        $this->dataReleaseId = $dataReleaseId;

        return $this;
    }

    /**
     * Get modification types.
     *
     * @return \JdPowered\Geofox\Enum\Set
     */
    public function getModificationTypes(): Set
    {
        return $this->modificationTypes ?? new Set(ModificationType::class);
    }

    /**
     * Set modification types.
     *
     * @param array $modificationTypes
     * @return \JdPowered\Geofox\Request\ListStations
     */
    public function setModificationTypes(array $modificationTypes): self
    {
        $this->modificationTypes = new Set(ModificationType::class);

        foreach ($modificationTypes as $modificationType) {
            $this->modificationTypes->attach(ModificationType::get($modificationType));
        }

        return $this;
    }

    /**
     * Get coordinate type.
     *
     * @return \JdPowered\Geofox\Enum\CoordinateType
     */
    public function getCoordinateType(): CoordinateType
    {
        return CoordinateType::get($this->coordinateType);
    }

    /**
     * Set coordinate type.
     *
     * @param string $coordinateType
     * @return \JdPowered\Geofox\Request\ListStations
     */
    public function setCoordinateType(string $coordinateType): self
    {
        $this->coordinateType = CoordinateType::get($coordinateType);

        return $this;
    }

    /**
     * Get whether you want to join equivalent stations together.
     *
     * @return bool
     */
    public function getFilterEquivalent(): bool
    {
        return $this->filterEquivalent;
    }

    /**
     * Set whether you want to join equivalent stations together.
     *
     * @param bool $filterEquivalent
     * @return \JdPowered\Geofox\Request\ListStations
     */
    public function setFilterEquivalent(bool $filterEquivalent): self
    {
        $this->filterEquivalent = $filterEquivalent;

        return $this;
    }

    /**
     * Apply default values.
     */
    protected function setDefaults()
    {
        parent::setDefaults();

        $this->dataReleaseId = null;
        $this->modificationTypes = new Set(ModificationType::class);
        $this->modificationTypes->attach(ModificationType::MAIN());
        $this->coordinateType = CoordinateType::EPSG_4326();
        $this->filterEquivalent = false;
    }

    /**
     * Build the request body.
     *
     * @return array
     */
    protected function httpBody(): array
    {
        return array_merge(parent::httpBody(), [
            'dataReleaseId'      => $this->getDataReleaseId(),
            'modificationsTypes' => $this->getModificationTypes()->getValues(),
            'coordinateType'     => $this->getCoordinateType(),
            'filterEquivalent'   => $this->getFilterEquivalent(),
        ]);
    }

    /**
     * Build the request URI.
     *
     * @return string
     */
    protected function uri(): string
    {
        return 'listStations';
    }
}
