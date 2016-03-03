<?php

namespace Kolyunya\WikiParser\Language;

class RussianLanguage implements LanguageInterface
{
    /***
     * @inheritdoc
     */
    public function getCode()
    {
        return 'ru';
    }

    /**
     * @inheritdoc
     */
    public function getCategory()
    {
        return 'Категория:Русские_существительные';
    }

    /**
     * @inheritdoc
     */
    public function getAlphabet()
    {
        return array(
            'а',
            'б',
            'в',
            'г',
            'д',
            'е',
            'ё',
            'ж',
            'з',
            'и',
            'й',
            'к',
            'л',
            'м',
            'н',
            'о',
            'п',
            'р',
            'с',
            'т',
            'у',
            'ф',
            'х',
            'ц',
            'ч',
            'ш',
            'щ',
            'ъ',
            'ы',
            'ь',
            'э',
            'ю',
            'я',
        );
    }
}
