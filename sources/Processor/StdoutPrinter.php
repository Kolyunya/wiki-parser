<?php

namespace Kolyunya\WikiParser\Processor;

use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Processor\ProcessorInterface;

/**
 * A processor which saves items to files.
 */
class StdoutPrinter implements ProcessorInterface
{
    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, $item)
    {
        $data = "$item\n";
        echo $data;
    }
}
