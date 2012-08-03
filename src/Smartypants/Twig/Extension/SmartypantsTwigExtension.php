<?php

namespace Smartypants\Twig\Extension;

use Smartypants\SmartypantsParserInterface;

class SmartypantsTwigExtension extends \Twig_Extension
{
    protected $parser;

    function __construct(SmartypantsParserInterface $parser)
    {
        $this->parser = $parser;
    }

    public function getFilters()
    {
        return array(
            'smartypants' => new \Twig_Filter_Method($this, 'smartypants', array('is_safe' => array('html'))),
        );
    }

    public function smartypants($txt)
    {
        return $this->parser->transform($txt);
    }

    public function getName()
    {
        return 'smartypants';
    }
}
