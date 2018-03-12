<?php

namespace JdPowered\Geofox\Traits;

trait MagicGettersSetters
{
    /**
     * @param string $name
     * @param array $args
     * @return mixed
     */
    public function __call(string $name, array $args)
    {
        if (method_exists($this, $name)) {
            return $this->{$name}(...$args);
        }

        if (property_exists($this, $name)) {
            return count($args) === 0
                ? $this->{'get' . $name}()
                : $this->{'set' . $name}(...$args);
        }
    }
}
