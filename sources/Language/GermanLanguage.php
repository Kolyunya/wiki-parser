<?php

namespace Kolyunya\WikiParser\Language;

class GermanLanguage implements LanguageInterface
{
    /***
     * @inheritdoc
     */
    public function getCode()
    {
        return 'de';
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
            'ß',
            't',
            'u',
            'v',
            'w',
            'x',
            'y',
            'z',
            'à',
            'ç',
            'è',
            'é',
            'ê',
            'ë',
            'ì',
            'î',
            'ï',
            'ò',
            'ó',
            'ù',
            'ą',
            'ć',
            'ĉ',
            'ę',
            'ĝ',
            'ĥ',
            'ĵ',
            'ł',
            'ń',
            'œ',
            'ś',
            'ŝ',
            'ŭ',
            'ź',
            'ż',
        );
    }
}
