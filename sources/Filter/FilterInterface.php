<?php

namespace Kolyunya\WikiParser\Filter;

use Kolyunya\WikiParser\Language\LanguageInterface;

interface FilterInterface
{
    /**
     * Decides whether the item passes filtering
     * @param LanguageInterface $language Item language.
     * @param string $item An item which will be filtered.
     * @return bool Returns `true` if $item passed filtering and `false` otherwise
     */
    public function process(LanguageInterface $language, $item);
}
