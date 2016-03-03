<?php

namespace Kolyunya\WikiParser\Language;

use Kolyunya\WikiParser\Language\EnglishLanguage;
use Kolyunya\WikiParser\Language\FrenchLanguage;
use Kolyunya\WikiParser\Language\GermanLanguage;
use Kolyunya\WikiParser\Language\LanguageFactoryInterface;
use Kolyunya\WikiParser\Language\RussianLanguage;

class LanguageFactory implements LanguageFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function makeLanguage($languageCode)
    {
        $language = null;
        switch ($languageCode) {
            case (new EnglishLanguage())->getCode():
                $language = new EnglishLanguage();
                break;
            case (new FrenchLanguage())->getCode():
                $language = new FrenchLanguage();
                break;
            case (new GermanLanguage())->getCode():
                $language = new GermanLanguage();
                break;
            case (new RussianLanguage())->getCode():
                $language = new RussianLanguage();
                break;
        }
        return $language;
    }
}
