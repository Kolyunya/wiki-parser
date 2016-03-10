<?php

namespace Kolyunya\WikiParser\Host;

use Kolyunya\WikiParser\Host\HostInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

class Wiktionary implements HostInterface
{
    /**
     * @inheritdoc
     */
    public function getApiUrl(LanguageInterface $language)
    {
        $languageCode = $language->getCode();
        $apiUrl = "https://$languageCode.wiktionary.org/w/api.php";
        return $apiUrl;
    }
}

