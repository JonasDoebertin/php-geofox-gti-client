<?php

namespace JdPowered\Geofox\Test\Unit;

use JdPowered\Geofox\Objects\GtiTime;
use JdPowered\Geofox\Test\TestCase;

class GtiTimeTest extends TestCase
{
    /** @test */
    public function it_can_be_created_without_passing_data()
    {
        $gtiTime = new GtiTime();

        $this->assertInstanceOf(GtiTime::class, $gtiTime);
    }

    /** @test */
    public function it_applies_default_data()
    {
        $gtiTime = new GtiTime();

        $this->assertEquals('heute', $gtiTime->getDate());
        $this->assertEquals('jetzt', $gtiTime->getTime());
    }

    /** @test */
    public function it_can_be_created_with_passing_data()
    {
        $gtiTime = new GtiTime($this->getGtiTimeData());

        $this->assertInstanceOf(GtiTime::class, $gtiTime);
    }

    /** @test */
    public function it_applies_the_passed_data()
    {
        $data = $this->getGtiTimeData();
        $gtiTime = new GtiTime($data);

        $this->assertEquals($data->date, $gtiTime->getDate());
        $this->assertEquals($data->time, $gtiTime->getTime());
    }

    /** @test */
    public function it_is_arrayable()
    {
        $data = $this->getGtiTimeData();
        $gtiTime = new GtiTime($data);

        $this->assertArraySubset([
            'date' => $data->date,
            'time' => $data->time,
        ], $gtiTime->toArray());
    }
}
