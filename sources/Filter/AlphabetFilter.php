<?php

namespace Kolyunya\WikiParser\Filter;

use Kolyunya\WikiParser\Filter\FilterInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

class AlphabetFilter implements FilterInterface
{
    /**
     *
     * @var bool
     */
    private $caseSensitive;

    public function __construct($caseSensitive = false)
    {
        $this->caseSensitive = $caseSensitive;
    }

    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, $item)
    {
        $alphabet = implode('', $language->getAlphabet());
        $wordPattern = "^[$alphabet]+$";
        $options = $this->getOptions();
        $itemPassed = mb_ereg_match($wordPattern, $item, $options);
        return $itemPassed;
    }

    /**
     *
     */
    private function getOptions()
    {
        // Enable Unicode support
        $options = 'u';

        // Enable case sensivity if needed
        if (!$this->caseSensitive) {
            $options .= 'i';
        }

        return $options;
    }
}
