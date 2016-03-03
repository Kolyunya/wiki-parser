# Wiktionary parser

## Description
This parser parses [wiktionary.org](https://www.wiktionary.org/) categories.

## Usage example
The following code parses [English nouns](https://en.wiktionary.org/wiki/Category:English_nouns) to a file.

~~~php
// Create a parser instance.
$parser = new Parser();

// Set language to English.
$language = new EnglishLanguage();
$parser->setLanguage($language);

// Set category to nouns.
$category = new NounsCategory();
$parser->setCategory($category);

// Add a filter which will filter out all non-alphabetical words.
$filter = new AlphabetFilter();
$parser->addFilter($filter);

// Create a processor which will write all words to a file.
$processor = new FileSaver();
$parser->addProcessor($processor);

// Perform parsing.
$parser->parse();
~~~
