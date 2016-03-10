<?php

namespace Kolyunya\WikiParser\Host;

use Kolyunya\WikiParser\Host\BaseHost;

class Wikipedia extends BaseHost
{
    /**
     * @inheritdoc
     */
    protected function getDomain()
    {
        $domain = 'wikipedia.org';
        return $domain;
    }
}
