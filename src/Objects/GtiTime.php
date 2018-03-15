<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Contracts\Arrayable;
use JdPowered\Geofox\Data;
use JdPowered\Geofox\Traits\MagicGettersSetters;

class GtiTime implements Arrayable
{
    use MagicGettersSetters;

    /**
     * @var string
     */
    public $date = 'heute';

    /**
     * @var string
     */
    public $time = 'jetzt';

    /**
     * Create a new instance (and optionally fill it from a JSON object).
     *
     * @param \JdPowered\Geofox\Data|null $data
     */
    public function __construct(Data $data = null)
    {
        if (is_null($data)) {
            return;
        }

        $this->setDate($data->date)
            ->setTime($data->time);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'date' => $this->getDate(),
            'time' => $this->getTime(),
        ];
    }

    /**
     * Get date.
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Set the date.
     *
     * @param string $date
     * @return GtiTime
     */
    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get time.
     *
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * Set the time.
     *
     * @param string $time
     * @return GtiTime
     */
    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }
}
