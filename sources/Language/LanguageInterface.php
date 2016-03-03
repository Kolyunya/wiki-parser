<?php

namespace Kolyunya\WikiParser\Language;

interface LanguageInterface
{
    /**
     * @return string
     */
    public function getCode();

    /**
     * @return array
     */
    public function getAlphabet();
}
