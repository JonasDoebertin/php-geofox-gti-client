<?php

namespace JdPowered\Geofox\Objects;

use JdPowered\Geofox\Contracts\Arrayable;
use JdPowered\Geofox\Json;

class GtiTime implements Arrayable
{
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
     * @param \JdPowered\Geofox\Json|null $data
     */
    public function __construct(Json $data = null)
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
    public function setDate(string $date): GtiTime
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
    public function setTime(string $time): GtiTime
    {
        $this->time = $time;

        return $this;
    }
}
