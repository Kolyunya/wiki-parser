<?php

namespace Kolyunya\WikiParser\Filter;

use Kolyunya\WikiParser\Filter\FilterInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

class MinimumLengthFilter implements FilterInterface
{
    /**
     *
     * @var bool
     */
    private $minimumLength;

    public function __construct($minimumLength = 2)
    {
        $this->minimumLength = $minimumLength;
    }

    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, $item)
    {
        if ($this->minimumLength < 0) {
            return true;
        }
        $actualLength = mb_strlen($item);
        $itemPassed = $actualLength >= $this->minimumLength;
        return $itemPassed;
    }
}
