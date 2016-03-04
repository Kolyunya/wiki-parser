<?php

require_once 'vendor/autoload.php';

use Kolyunya\WikiParser\Category\NounsCategory;
use Kolyunya\WikiParser\Filter\AlphabetFilter;
use Kolyunya\WikiParser\Filter\MinimumLengthFilter;
use Kolyunya\WikiParser\Language\LanguageFactory;
use Kolyunya\WikiParser\Parser\Parser;
use Kolyunya\WikiParser\Processor\StdoutPrinter;

// Construct a parser instance
$parser = new Parser();

// Set language to English
$languageFactory = new LanguageFactory();
$languageCode = $argv[1];
$language = $languageFactory->makeLanguage($languageCode);
$parser->setLanguage($language);

// Set category to nouns
$category = new NounsCategory();
$parser->setCategory($category);

// Add a filter which will filter out all non-word items.
$alphabetFilter = new AlphabetFilter();
$parser->addFilter($alphabetFilter);

// Add a filter which will filter out all one-letter words.
$minimumLengthFilter = new MinimumLengthFilter();
$parser->addFilter($minimumLengthFilter);

// Create a processor which will print all filtered items to an stdout
$processor = new StdoutPrinter();
$parser->addProcessor($processor);

// Perform parsing
$parser->parse();
