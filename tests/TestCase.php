<?php

namespace JdPowered\Geofox\Test;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    use Assertions,
        GeneratesData;

    public function setUp()
    {
        parent::setUp();
    }
}
