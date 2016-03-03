<?php

require_once 'vendor/autoload.php';

use Kolyunya\WikiParser\Category\NounsCategory;
use Kolyunya\WikiParser\Filter\AlphabetFilter;
use Kolyunya\WikiParser\Language\EnglishLanguage;
use Kolyunya\WikiParser\Parser\Parser;
use Kolyunya\WikiParser\Processor\StdoutPrinter;

// Construct a parser instance
$parser = new Parser();

// Set language to English
$language = new EnglishLanguage();
$parser->setLanguage($language);

// Set category to nouns
$category = new NounsCategory();
$parser->setCategory($category);

// Create a filter which will filter out all non-word items.
$filter = new AlphabetFilter();
$parser->addFilter($filter);

// Create a processor which will print all filtered items to an stdout
$processor = new StdoutPrinter();
$parser->addProcessor($processor);

// Perform parsing
$parser->parse();
