<?php

namespace Kolyunya\WikiParser\Host;

use Kolyunya\WikiParser\Language\LanguageInterface;

interface HostInterface
{
    /**
     * Returns API URL for a specific language.
     * @param LanguageInteface $language Language.
     * @return string Wiki API URL.
     */
    public function getApiUrl(LanguageInterface $language);
}
