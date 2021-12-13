<?php

namespace Dimsog\Comments\Classes;

use Cms\Classes\ComponentBase as WinterComponentBase;

abstract class ComponentBase extends WinterComponentBase
{
    protected function getUrl(): string
    {
        $url = $this->property('url');
        if (empty($url)) {
            $url = request()->path();
        }
        return $url;
    }
}
