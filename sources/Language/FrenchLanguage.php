<?php

namespace Kolyunya\WikiParser\Language;

class FrenchLanguage implements LanguageInterface
{
    /***
     * @inheritdoc
     */
    public function getCode()
    {
        return 'fr';
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
            'â',
            'à',
            'ç',
            'è',
            'ê',
            'é',
            'ë',
            'î',
            'ï',
            'ô',
            'û',
            'ù',
            'ü',
            'ÿ',
            'æ',
            'œ',
        );
    }
}
