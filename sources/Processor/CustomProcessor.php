<?php

namespace Kolyunya\WikiParser\Processor;

use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Processor\ProcessorInterface;

/**
 * A processor which saves items to files.
 */
class CustomProcessor implements ProcessorInterface
{
    /**
     * Custom processor routine
     * @var callable
     */
    private $procesor;


    /**
     * Constructs a custom processor
     */
    public function __construct(callable $processor)
    {
        $this->procesor = $processor;
    }

    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, &$item)
    {
        call_user_func_array(
            $this->procesor,
            [
                $language,
                &$item,
            ]
        );
    }
}
