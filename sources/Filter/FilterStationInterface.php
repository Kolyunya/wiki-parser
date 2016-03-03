<?php

namespace Kolyunya\WikiParser\Filter;

use Kolyunya\WikiParser\Filter\FilterInterface;

interface FilterStationInterface extends FilterInterface
{
    /**
     * Adds a filter to the filters collection.
     * @param FilterInterface $filter A filter to be added.
     * @return int A non-negative ID of the added filter. `-1` on error.
     */
    public function addFilter(FilterInterface $filter);

    /**
     * Removes a filter from the filter collection
     * @param int $filterId Filter identificator
     * @return bool Returns `true` if the filter was found by ID and successfully
     *              deleted. Returns `false` on error.
     */
    public function removeFilter($filterId);

    /**
     * Determines if the filters collection has the particular filter
     * @param int $filterId Filter identificator.
     */
    public function hasFilter($filterId);
}
