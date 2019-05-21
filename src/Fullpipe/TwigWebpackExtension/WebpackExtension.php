<?php

namespace Fullpipe\TwigWebpackExtension;

use Fullpipe\TwigWebpackExtension\TokenParser\EntryTokenParserCss;
use Fullpipe\TwigWebpackExtension\TokenParser\EntryTokenParserJs;

class WebpackExtension extends \Twig_Extension
{
    protected $manifestFile;
    protected $publicPathJs;
    protected $publicPathCss;
    protected $useDeferAttributeForJsFile;
    protected $useDeferAttributeForCssFile;

    public function __construct($manifestFile, $publicPathJs = '/js/', $publicPathCss = '/css/', $useDeferAttributeForJsFile = false, $useDeferAttributeForCssFile = false)
    {
        $this->manifestFile = $manifestFile;
        $this->publicPathJs = $publicPathJs;
        $this->publicPathCss = $publicPathCss;
        $this->useDeferAttributeForJsFile = $useDeferAttributeForJsFile;
        $this->useDeferAttributeForCssFile = $useDeferAttributeForCssFile;
    }

    public function getName()
    {
        return 'fullpipe.extension.webpack';
    }

    public function getTokenParsers()
    {
        return [
            new EntryTokenParserJs($this->manifestFile, $this->publicPathJs, $this->useDeferAttributeForJsFile),
            new EntryTokenParserCss($this->manifestFile, $this->publicPathCss, $this->useDeferAttributeForCssFile),
        ];
    }
}
