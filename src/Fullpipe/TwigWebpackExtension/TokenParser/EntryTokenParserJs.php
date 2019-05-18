<?php

namespace Fullpipe\TwigWebpackExtension\TokenParser;

class EntryTokenParserJs extends EntryTokenParser
{
    protected function type()
    {
        return 'js';
    }

    protected function generateHtml($entryPath)
    {
        if($this->useAsyncAttribute) {
            return '<script async type="text/javascript" src="' . $entryPath . '"></script>';
        }
        return '<script type="text/javascript" src="' . $entryPath . '"></script>';
    }
}
