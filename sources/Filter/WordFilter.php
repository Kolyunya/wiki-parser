<?php

namespace Kolyunya\WikiParser\Filter;

use Kolyunya\WikiParser\Filter\FilterInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

class WordFilter implements FilterInterface
{
    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, $item)
    {
        $wordPattern = '^\w+$';
        $itemPassed = mb_ereg_match($wordPattern, $item);
        return $itemPassed;
    }
}
