<?php

namespace Fullpipe\TwigWebpackExtension;

use Fullpipe\TwigWebpackExtension\TokenParser\EntryTokenParserCss;
use Fullpipe\TwigWebpackExtension\TokenParser\EntryTokenParserJs;

class WebpackExtension extends \Twig_Extension
{
    protected $manifestFile;
    protected $publicPathJs;
    protected $publicPathCss;
    protected $useAsyncAttributeForJsFile;
    protected $useAsyncAttributeForCssFile;

    public function __construct($manifestFile, $publicPathJs = '/js/', $publicPathCss = '/css/', $useAsyncAttributeForJsFile = false, $useAsyncAttributeForCssFile = false)
    {
        $this->manifestFile = $manifestFile;
        $this->publicPathJs = $publicPathJs;
        $this->publicPathCss = $publicPathCss;
        $this->useAsyncAttributeForJsFile = $useAsyncAttributeForJsFile;
        $this->useAsyncAttributeForCssFile = $useAsyncAttributeForCssFile;
    }

    public function getName()
    {
        return 'fullpipe.extension.webpack';
    }

    public function getTokenParsers()
    {
        return [
            new EntryTokenParserJs($this->manifestFile, $this->publicPathJs, $this->useAsyncAttributeForJsFile),
            new EntryTokenParserCss($this->manifestFile, $this->publicPathCss, $this->useAsyncAttributeForCssFile),
        ];
    }
}
