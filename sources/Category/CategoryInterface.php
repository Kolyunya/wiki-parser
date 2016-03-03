<?php

namespace Kolyunya\WikiParser\Category;

use Kolyunya\WikiParser\Language\LanguageInterface;

interface CategoryInterface
{
    /**
     * Returns the name of the category for the corresponding language.
     * @param LanguageInterface $language
     * @return string Name of the category for the corresponding language.
     */
    public function getCategoryName(LanguageInterface $language);
}
