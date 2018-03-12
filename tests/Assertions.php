<?php

namespace JdPowered\Geofox\Test;

trait Assertions
{
    /**
     * @param array $keys
     * @param array $array
     */
    protected function assertArrayHasKeys(array $keys, array $array)
    {
        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, $array);
        }
    }
}
