<?php

namespace NicklasW\PkmGoApi\Authenticators\PTC\Parsers;

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
    public function __construct($dom = null)
    {
        $this->dom = $dom;
    }

    /**
     * The method which parses the content.
     *
     * @param mixed $content
     * @return Result
     */
    abstract public function parse($content);

}