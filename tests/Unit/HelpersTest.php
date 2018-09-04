<?php

namespace JdPowered\Geofox\Test\Unit;

use function JdPowered\Geofox\filterArray;
use JdPowered\Geofox\Test\TestCase;

class HelpersTest extends TestCase
{
    /** @test */
    function it_filters_out_null_values() {
        $result = filterArray([
            'foo' => 'bar',
            'bar' => null,
            null,
        ]);

        $this->assertCount(1, $result);
    }

    /** @test */
    function it_filters_out_empty_array_values() {
        $result = filterArray([
            'foo' => 'bar',
            'bar' => [],
            [],
        ]);

        $this->assertCount(1, $result);
    }

    /** @test */
    function it_returns_null_for_empty_result_sets() {
        $result = filterArray([]);

        $this->assertNull($result);
    }

    /** @test */
    function it_leaves_wanted_values_intact() {
        $result = filterArray([
            'foo' => 'bar',
            'bar' => 1,
            'baz' => true,
            'qux' => ['foobar', 'quux'],
        ]);

        $this->assertCount(4, $result);
    }
}
