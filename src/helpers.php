<?php

namespace JdPowered\Geofox;

/**
 * Filter an array.
 *
 * Filters out all `null` and empty array values from a given array.
 *
 * @param array $items
 * @return array|null
 */
function filterArray(array $items): ?array {
    $items = array_filter($items, function ($item) {
        return is_array($item) ? count($item) : $item !== null;
    });

    return $items;
}
