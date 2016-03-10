<?php

namespace Kolyunya\WikiParser\Parser;

use Kolyunya\WikiParser\Category\CategoryInterface;
use Kolyunya\WikiParser\Filter\FilterInterface;
use Kolyunya\WikiParser\Host\HostInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Processor\ProcessorInterface;

/**
 * An interface of a generic Wikipedia parser
 * @author Kolyunya
 */
interface ParserInterface
{
    /**
     * Sets a host to parse from
     * @param HostInterface $host
     */
    public function setHost(HostInterface $host);

    /**
     * Sets a language to parse
     * @param LanguageInterface $language
     */
    public function setLanguage(LanguageInterface $language);

    /**
     * Sets a category to parse
     * @param CategoryInterface $category
     */
    public function setCategory(CategoryInterface $category);

    /**
     * Adds a filter to the parser
     * @param FilterInterface $filter
     */
    public function addFilter(FilterInterface $filter);

    /**
     * Adds a processor to the parser
     * @param ProcessorInterface $processor
     */
    public function addProcessor(ProcessorInterface $processor);

    /**
     * Perform actual parsing
     */
    public function parse();
}
