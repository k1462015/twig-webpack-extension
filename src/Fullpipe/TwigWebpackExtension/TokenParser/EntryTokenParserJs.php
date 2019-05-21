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
        if($this->useDeferAttribute) {
            return '<script defer type="text/javascript" src="' . $entryPath . '"></script>';
        }
        return '<script type="text/javascript" src="' . $entryPath . '"></script>';
    }
}
