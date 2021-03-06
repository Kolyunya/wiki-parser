<?php

namespace Kolyunya\WikiParser\Parser;

use Kolyunya\WikiParser\Category\CategoryInterface;
use Kolyunya\WikiParser\Filter\FilterInterface;
use Kolyunya\WikiParser\Filter\FilterStationInterface;
use Kolyunya\WikiParser\Filter\FilterStation;
use Kolyunya\WikiParser\Host\HostInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Parser\ParserInterface;
use Kolyunya\WikiParser\Processor\ProcessorInterface;

class Parser implements ParserInterface
{
    /**
     * Host to parse from
     * @var HostInterface
     */
    private $host;

    /**
     * Language to be parsed
     * @var LanguageInterface
     */
    private $language;

    /**
     * Category to be parsed
     * @var CategoryInterface
     */
    private $category;

    /**
     * Filter station
     * @var FilterStationInterface
     */
    private $filterStation;

    /**
     * A collection of processors
     * @var array
     */
    private $processors;

    /**
     * Iniitalizes private variables
     */
    public function __construct()
    {
        $this->filterStation = new FilterStation();
        $this->processors = array();
    }

    /**
     * @inheritdoc
     */
    public function setHost(HostInterface $host)
    {
        $this->host = $host;
    }

    /**
     * @inheritdoc
     */
    public function setLanguage(LanguageInterface $language)
    {
        $this->language = $language;
    }

    /**
     * @inheritdoc
     */
    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * @inheritdoc
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filterStation->addFilter($filter);
    }

    /**
     * @inheritdoc
     */
    public function addProcessor(ProcessorInterface $processor)
    {
        $this->processors[] = $processor;
    }

    /**
     * @inheritdoc
     */
    public function parse()
    {
        $nextPageToken = null;
        do {
            $pageUrl = $this->getPageUrl($nextPageToken);
            $categoriesData = file_get_contents($pageUrl);
            $categoriesJson = json_decode($categoriesData);
            $categories = $categoriesJson->query->categorymembers;
            foreach ($categories as $catogory) {
                $item = $catogory->title;
                $this->processItem($item);
            }
            if (isset($categoriesJson->continue)) {
                $nextPageToken = $categoriesJson->continue->cmcontinue;
            } else {
                $nextPageToken = null;
            }
        } while ($nextPageToken);
    }

    /**
     * Constructs a category page URL
     * @param string $nextPageToken
     * @return string Next page URL
     */
    private function getPageUrl($nextPageToken)
    {
        $language = $this->language;
        $categoryTitle = $this->category->getTitle($language);
        $requestQuery = http_build_query([
            'format' => 'json',
            'action' => 'query',
            'list' => 'categorymembers',
            'cmtitle' => $categoryTitle,
            'cmtype' => 'page',
            'cmlimit' => 'max',
            'cmcontinue' => $nextPageToken,
        ]);
        $apiUrl = $this->host->getApiUrl($this->language);
        $requestUrl = "$apiUrl?$requestQuery";
        return $requestUrl;
    }

    /**
     * Processes an item
     * @param string $item
     */
    private function processItem($item)
    {
        // Pass the item through all installed filters
        $filteringPassed = $this->filterStation->process($this->language, $item);
        if (!$filteringPassed) {
            return;
        }

        // Pass the item through all installed processors
        foreach ($this->processors as $processor) {
            $processor->process($this->language, $item);
        }
    }
}
