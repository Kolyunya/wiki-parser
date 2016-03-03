<?php

namespace Kolyunya\WikiParser\Category;

use Kolyunya\WikiParser\Language\EnglishLanguage;
use Kolyunya\WikiParser\Language\FrenchLanguage;
use Kolyunya\WikiParser\Language\GermanLanguage;
use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Language\RussianLanguage;
use Kolyunya\WikiParser\Category\CategoryInterface;

class NounsCategory extends BaseCategory implements CategoryInterface
{
    /**
     * Constructs a category of nouns.
     */
    public function __construct()
    {
        $this->setTitle(
            new EnglishLanguage(),
            'Category:English_nouns'
        );

        $this->setTitle(
            new FrenchLanguage(),
            'Catégorie:Noms_communs_en_français'
        );

        $this->setTitle(
            new GermanLanguage(),
            'Kategorie:Substantiv_(Deutsch)'
        );

        $this->setTitle(
            new RussianLanguage(),
            'Категория:Русские_существительные'
        );
    }
}
