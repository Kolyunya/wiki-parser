<?php

namespace Kolyunya\WikiParser\Host;

use Kolyunya\WikiParser\Host\BaseHost;

class Wiktionary extends BaseHost
{
    /**
     * @inheritdoc
     */
    protected function getDomain()
    {
        $domain = 'wiktionary.org';
        return $domain;
    }
}

