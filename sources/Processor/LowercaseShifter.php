<?php

namespace Kolyunya\WikiParser\Processor;

use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Processor\ProcessorInterface;

/**
 * A processor which saves items to files.
 */
class LowercaseShifter implements ProcessorInterface
{
    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, &$item)
    {
        $item = mb_strtolower($item);
    }
}
