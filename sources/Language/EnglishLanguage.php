<?php

namespace Kolyunya\WikiParser\Language;

class EnglishLanguage implements LanguageInterface
{
    /***
     * @inheritdoc
     */
    public function getCode()
    {
        return 'en';
    }
    
    /**
     * @inheritdoc
     */
    public function getAlphabet()
    {
        return array(
            'a',
            'b',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'q',
            'r',
            's',
            't',
            'u',
            'v',
            'w',
            'x',
            'y',
            'z',
        );
    }
}
