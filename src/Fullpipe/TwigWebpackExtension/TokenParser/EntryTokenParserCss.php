<?php

namespace Fullpipe\TwigWebpackExtension\TokenParser;

class EntryTokenParserCss extends EntryTokenParser
{
    protected function type()
    {
        return 'css';
    }

    protected function generateHtml($entryPath)
    {
        if($this->useDeferAttribute) {
            return '<link defer type="text/css" href="' . $entryPath . '" rel="stylesheet">';
        }
        return '<link type="text/css" href="' . $entryPath . '" rel="stylesheet">';
    }
}
