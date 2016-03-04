# Wiktionary parser

## Description
This parser parses [wiktionary.org](https://www.wiktionary.org/) categories.

## Installation
This package is [composer-enabled](https://packagist.org/packages/kolyunya/wiktionary-parser). Just require it in your `composer.json`.
~~~json
"require": {
    "kolyunya/wiktionary-parser": "*"
}
~~~

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

## Available filters
* `WordFilter` - passes words matching the `^\w+$` regular expression pattern.
* `AlphabetFilter` - passes words containing only alphabetical characters in a corresponding language.
* `MinimumLengthFilter` - passes words longer than a specified length.
* `MaximumLengthFilter` - passes words shorter than a specified length.

## Available processors
* `StdoutPrinter` - prints all words to the `stdout`.
* `FileSaver` - saves all words to a specified file.
* `LowercaseShifter` - converts all words to a lowercase.
* `UppercaseShifter` - converts all words to an uppercase.
