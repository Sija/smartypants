<?php

namespace Smartypants;

interface SmartypantsParserInterface
{
    /**
     * Converts text to html using markdown rules
     *
     * @param string $text plain text
     * @return string rendered html
     */
    function transform($text);
}
