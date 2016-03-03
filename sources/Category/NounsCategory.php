<?php

namespace Kolyunya\WikiParser\Category;

use Kolyunya\WikiParser\Language\EnglishLanguage;
use Kolyunya\WikiParser\Language\FrenchLanguage;
use Kolyunya\WikiParser\Language\GermanLanguage;
use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Language\RussianLanguage;
use Kolyunya\WikiParser\Category\CategoryInterface;

class NounsCategory implements CategoryInterface
{
    /**
     * @inheritdoc
     */
    public function getCategoryName(LanguageInterface $language)
    {
        $categoryName = null;
        $languageClass = get_class($language);
        switch ($languageClass) {
            case get_class(new EnglishLanguage()):
                $categoryName = 'Category:English_nouns';
                break;
            case get_class(new FrenchLanguage()):
                $categoryName = 'Catégorie:Noms_communs_en_français';
                break;
            case get_class(new GermanLanguage()):
                $categoryName = 'Kategorie:Substantiv_(Deutsch)';
                break;
            case get_class(new RussianLanguage()):
                $categoryName = 'Категория:Русские_существительные';
                break;
        }
        return $categoryName;
    }
}
