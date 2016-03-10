<?php

namespace Kolyunya\WikiParser\Host;

use Kolyunya\WikiParser\Host\HostInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

class Wikipedia implements HostInterface
{
    /**
     * @inheritdoc
     */
    public function getApiUrl(LanguageInterface $language)
    {
        $languageCode = $language->getCode();
        $apiUrl = "https://$languageCode.wikipedia.org/w/api.php";
        return $apiUrl;
    }
}

