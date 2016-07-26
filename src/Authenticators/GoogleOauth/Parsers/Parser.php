<?php

namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers;

use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\Result;
use PHPHtmlParser\Dom;

abstract class Parser {

    /**
     * @var Dom The DOM
     */
    protected $dom;

    /**
     * Parser constructor.
     *
     * @param Dom    $dom
     */
    public function __construct($dom)
    {
        $this->dom = $dom;
    }

    /**
     * The method which parses the content.
     *
     * @param string $content
     * @return Result
     */
    abstract public function parse($content);

}