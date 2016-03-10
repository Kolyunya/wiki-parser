<?php

namespace Kolyunya\WikiParser\Host;

use Kolyunya\WikiParser\Host\HostInterface;
use Kolyunya\WikiParser\Language\LanguageInterface;

abstract class BaseHost implements HostInterface
{
    /**
     * @inheritdoc
     */
    public function getApiUrl(LanguageInterface $language)
    {
        $languageCode = $language->getCode();
        $domain = $this->getDomain();
        $apiUrl = "https://$languageCode.$domain/w/api.php";
        return $apiUrl;
    }

    /**
     * Returns host domain.
     * @return string Host domain.
     */
    abstract protected function getDomain();
}
