# Wiktionary parser

## Description
This parser parses [MediaWiki](https://www.mediawiki.org) categories.

## Installation
This package is [composer-enabled](https://packagist.org/packages/kolyunya/wiki-parser). Just require it in your `composer.json`.
~~~json
"require": {
    "kolyunya/wiki-parser": "*"
}
~~~

## Usage example
The following code parses [English nouns](https://en.wiktionary.org/wiki/Category:English_nouns) to a file.

~~~php
// Create a parser instance.
$parser = new Parser();

// Set host to wiktionary
$host = new Wiktionary();
$parser->setHost($host);

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
* `DatabaseSaver` - saves all words to a database.
* `LowercaseShifter` - converts all words to a lowercase.
* `UppercaseShifter` - converts all words to an uppercase.

## Adding languages
To add an arbitrary language you should implement the `LanguageInterface`. It contains only to methods. The `getCode` method must return the standard language code (e.g. `en` for English). The `getAlphabet` method must return an array of letters in language alphabet.

## Custom categories
The recomended way of implementing custom categories is to extend the `BaseCategory` class. You should use the `setTitle` method in your category class constructor to add titles for specific languages.

~~~php
class NounsCategory extends BaseCategory implements CategoryInterface
{
    public function __construct()
    {
        $this->setTitle(new EnglishLanguage(), 'Category:English_nouns');
        $this->setTitle(new FrenchLanguage(), 'Catégorie:Noms_communs_en_français');
        $this->setTitle(new GermanLanguage(), 'Kategorie:Substantiv_(Deutsch)');
        $this->setTitle(new RussianLanguage(), 'Категория:Русские_существительные');
    }
}
~~~

## Custom processors
If you need to implement a custom processor you have two options.

First, you can implement the `ProcessorInterface` which is quite straightforward.
~~~php
class StdoutPrinter implements ProcessorInterface
{
    public function process(LanguageInterface $language, &$item)
    {
        $data = "$item\n";
        echo $data;
    }
}
~~~

Second, you can use a `CustomProcessor` which should be provided with a callback function which will do something.
~~~php
$stdoutPrinter = new CustomProcessor(
    function (LanguageInterface $language, &$item) {
        $data = "$item\n";
        echo $data;
    }
);
~~~
