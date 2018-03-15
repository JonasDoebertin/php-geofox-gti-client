<?php

namespace JdPowered\Geofox;

use JdPowered\Geofox\Exception\InvalidJsonException;
use stdClass;

class Data
{
    /**
     * The underlying object.
     *
     * @var mixed
     */
    protected $data;

    /**
     * Create a new optional instance.
     *
     * @param \stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->data = $data;
    }

    /**
     * Create from json string.
     *
     * @param string $json
     * @throws \JdPowered\Geofox\Exception\InvalidJsonException
     * @return \JdPowered\Geofox\Data
     */
    public static function createFromJson(string $json): self
    {
        $decoded = json_decode($json, false);

        if (is_null($decoded)) {
            throw new InvalidJsonException(json_last_error_msg());
        }

        return new static($decoded);
    }

    /**
     * Dynamically access a property on the underlying object.
     *
     * @param  string $key
     * @return mixed|null
     */
    public function __get(string $key)
    {
        $value = $this->data->{$key} ?? null;

        if (is_object($value)) {
            return new static($value);
        }

        if (is_array($value)) {
            return array_map(function ($item) {
                return is_object($item) ? new static($item) : $item;
            }, $value);
        }

        return $value;
    }
}
