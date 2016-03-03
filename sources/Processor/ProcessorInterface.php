<?php

namespace Kolyunya\WikiParser\Processor;

use Kolyunya\WikiParser\Language\LanguageInterface;

interface ProcessorInterface
{
    /**
     * Performs some action for a language item.
     * @param LanguageInterface $language
     * @param string $item
     */
    public function process(LanguageInterface $language, $item);
}
