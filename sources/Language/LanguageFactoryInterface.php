<?php

namespace Kolyunya\WikiParser\Language;

interface LanguageFactoryInterface
{
    /**
     * Constructs a language by it's code
     * @param string $languageCode
     * @return LanguageInterface Language instance.
     */
    public function makeLanguage($languageCode);
}
