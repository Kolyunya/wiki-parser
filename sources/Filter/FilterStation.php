<?php

namespace Kolyunya\WikiParser\Filter;

use Kolyunya\WikiParser\Filter\FilterInterface;
use Kolyunya\WikiParser\Filter\FilterStationInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

class FilterStation implements FilterStationInterface
{
    /**
     * A collection of fileters indexed by ID
     * @var array
     */
    private $filters;

    /**
     * Stores the last added filter ID
     * @var int
     */
    private $filterId;

    /**
     * Initializes private variables
     */
    public function __construct()
    {
        $this->filters = array();
        $this->filterId = 0;
    }

    /**
     * @inheritdoc
     */
    public function addFilter(FilterInterface $filter)
    {
        $filterId = $this->getNextFilterId();
        if ($filterId >= 0) {
            $this->filters[$filterId] = $filter;
        }
        return $filterId;
    }

    /**
     * @inheritdoc
     */
    public function removeFilter($filterId)
    {
        if (!$this->hasFilter($filterId)) {
            return false;
        }
        unset($this->filters[$filterId]);
        return true;
    }

    /**
     * @inheritdoc
     */
    public function hasFilter($filterId)
    {
        $hasFilter = array_key_exists($filterId, $this->filters);
        return $hasFilter;
    }

    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, $item)
    {
        foreach ($this->filters as $filter) {
            $filterPassed = $filter->process($language, $item);
            if (!$filterPassed) {
                return false;
            }
        }
        return true;
    }

    /**
     * Calculates the next filter identificator.
     * @return int A non-negative nubmer - next filter ID. `-1` on error.
     */
    private function getNextFilterId()
    {
        $filterId = -1;
        while (true) {
            $filterId = $this->filterId + 1;
            if (!$this->hasFilter($filterId)) {
                break;
            }
        }
        return $filterId;
    }
}
