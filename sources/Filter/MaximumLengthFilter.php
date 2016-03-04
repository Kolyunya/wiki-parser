<?php

namespace Kolyunya\WikiParser\Filter;

use Kolyunya\WikiParser\Filter\FilterInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

class MaximumLengthFilter implements FilterInterface
{
    /**
     *
     * @var bool
     */
    private $maximumLength;

    public function __construct($maximumLength = -1)
    {
        $this->maximumLength = $maximumLength;
    }

    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, $item)
    {
        if ($this->maximumLength < 0) {
            return true;
        }
        $actualLength = mb_strlen($item);
        $itemPassed = $actualLength >= $this->maximumLength;
        return $itemPassed;
    }
}
