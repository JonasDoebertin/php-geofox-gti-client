<?php

namespace JdPowered\Geofox\Test\Unit;

use JdPowered\Geofox\Enum\SdType;
use JdPowered\Geofox\Objects\Coordinate;
use JdPowered\Geofox\Objects\SdName;
use JdPowered\Geofox\Test\TestCase;

class SdNameTest extends TestCase
{
    /** @test */
    public function it_can_be_created_without_passing_data()
    {
        $sdName = new SdName();

        $this->assertInstanceOf(SdName::class, $sdName);
    }

    /** @test */
    public function it_can_be_created_with_passing_data()
    {
        $sdName = new SdName($this->getSdNameData());

        $this->assertInstanceOf(SdName::class, $sdName);
    }

    /** @test */
    public function it_applies_the_passed_data()
    {
        $data = $this->getSdNameData();
        $sdName = new SdName($data);

        $this->assertEquals($data->id, $sdName->getId());
        $this->assertEquals($data->type, $sdName->getType());
        $this->assertEquals($data->name, $sdName->getName());
        $this->assertEquals($data->city, $sdName->getCity());
        $this->assertEquals($data->combinedName, $sdName->getCombinedName());
        $this->assertEquals($data->coordinate->x, $sdName->getCoordinate()->getLng());
        $this->assertEquals($data->coordinate->y, $sdName->getCoordinate()->getLat());
    }

    /** @test */
    public function it_transforms_type_data_to_a_sdtype_enum_instance()
    {
        $sdName = new SdName($this->getSdNameData());

        $this->assertInstanceOf(SdType::class, $sdName->getType());
    }

    /** @test */
    public function it_transforms_coordinate_data_to_a_coordinate_class_instance()
    {
        $sdName = new SdName($this->getSdNameData());

        $this->assertInstanceOf(Coordinate::class, $sdName->getCoordinate());
    }
}
