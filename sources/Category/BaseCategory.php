<?php

namespace Kolyunya\WikiParser\Category;

use Kolyunya\WikiParser\Category\CategoryInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;
use UnexpectedValueException;

class BaseCategory implements CategoryInterface
{
    /**
     * Category titles
     * @var array
     */
    private $titles;

    /**
     * Initializes titles array
     */
    public function __construct()
    {
        $this->titles = array();
    }

    /**
     * @inheritdoc
     */
    public function getTitle(LanguageInterface $language)
    {
        $languageCode = $language->getCode();
        $languageAvailable = array_key_exists($languageCode, $this->titles);
        if (!$languageAvailable) {
            throw new UnexpectedValueException('Language is not supported');
        }
        $title = $this->titles[$languageCode];
        return $title;
    }

    /**
     * Adds a category title for the given language.
     * @param LanguageInterface $language Language of the corresponding category.
     * @param string $title Category title for the corresponding language.
     */
    protected function setTitle(LanguageInterface $language, $title)
    {
        $languageCode = $language->getCode();
        $this->titles[$languageCode] = $title;
    }
}
