<?php

namespace JdPowered\Geofox\Test\Unit;

use JdPowered\Geofox\Objects\Coordinate;
use JdPowered\Geofox\Test\TestCase;

class CoordinateTest extends TestCase
{
    /** @test */
    public function it_can_be_created_without_passing_data()
    {
        $coordinate = new Coordinate();

        $this->assertInstanceOf(Coordinate::class, $coordinate);
    }

    /** @test */
    public function it_applies_default_data()
    {
        $coordinate = new Coordinate();

        $this->assertEquals(0, $coordinate->getLat());
        $this->assertEquals(0, $coordinate->getLng());
    }

    /** @test */
    public function it_can_be_created_with_passing_data()
    {
        $coordinate = new Coordinate($this->getCoordinateData());

        $this->assertInstanceOf(Coordinate::class, $coordinate);
    }

    /** @test */
    public function it_applies_the_passed_data()
    {
        $data = $this->getCoordinateData();
        $coordinate = new Coordinate($data);

        $this->assertEquals($data->x, $coordinate->getLng());
        $this->assertEquals($data->y, $coordinate->getLat());
    }

    /** @test */
    public function it_is_arrayable()
    {
        $data = $this->getCoordinateData();
        $coordinate = new Coordinate($data);

        $this->assertArraySubset([
            'lng' => $data->x,
            'lat' => $data->y,
        ], $coordinate->toArray());
    }
}
