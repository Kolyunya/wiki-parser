<?php

namespace Kolyunya\WikiParser\Processor;

use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Processor\ProcessorInterface;

/**
 * A processor which saves items to files.
 */
class FileSaver implements ProcessorInterface
{
    /**
     * File name to save items to.
     * @var type
     */
    private $fileName;

    /**
     * @param string $fileName File name to save items to.
     */
    public function __construct($fileName = null)
    {
        $this->fileName = $fileName;
    }

    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, &$item)
    {
        $fileName = $this->getFileName($language);
        $data = "$item\n";
        $flags = FILE_APPEND | LOCK_EX;
        file_put_contents($fileName, $data, $flags);
    }

    /**
     * @param LanguageInterface $language
     * @return string File name to save item to.
     */
    private function getFileName(LanguageInterface $language)
    {
        $fileName = null;
        if ($this->fileName !== null) {
            $fileName = $this->fileName;
        } elseif ($language !== null) {
            $fileName = $language->getCode();
        }
        return $fileName;
    }
}
