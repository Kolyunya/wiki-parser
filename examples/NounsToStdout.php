<?php

require_once 'vendor/autoload.php';

use Kolyunya\WikiParser\Category\NounsCategory;
use Kolyunya\WikiParser\Filter\AlphabetFilter;
use Kolyunya\WikiParser\Filter\MinimumLengthFilter;
use Kolyunya\WikiParser\Host\Wiktionary;
use Kolyunya\WikiParser\Language\LanguageFactory;
use Kolyunya\WikiParser\Parser\Parser;
use Kolyunya\WikiParser\Processor\LowercaseShifter;
use Kolyunya\WikiParser\Processor\StdoutPrinter;

// Construct a parser instance
$parser = new Parser();

// Set host to wiktionary
$host = new Wiktionary();
$parser->setHost($host);

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

// Add a processor which will shift all words to lowercase.
$lowercaseShifter = new LowercaseShifter();
$parser->addProcessor($lowercaseShifter);

// Add a processor which will print all filtered items to an stdout
$stdoutPrinter = new StdoutPrinter();
$parser->addProcessor($stdoutPrinter);

// Perform parsing
$parser->parse();
