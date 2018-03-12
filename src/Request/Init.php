<?php

namespace JdPowered\Geofox\Request;

class Init extends Base
{
    /**
     * Build the request URI.
     *
     * @return string
     */
    protected function uri(): string
    {
        return 'init';
    }
}
