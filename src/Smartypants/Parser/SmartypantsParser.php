<?php

namespace Smartypants\Parser;

use Smartypants\SmartypantsParserInterface;

/**
 * MarkdownParser
 *
 * This class extends the original Markdown parser.
 * It allows to disable unwanted features to increase performances.
 */
class SmartypantsParser extends \SmartyPantsParser implements SmartypantsParserInterface
{

    /**
     * @var array enabled features
     * use the constructor to disable some of them
     */
    protected $features = array(
        'smart_quotes'  => 2,
        'smart_dashes'  => 2,
        'smart_elipsis' => true,
    );

    /**
     * Create a new instance and enable or disable features.
     * @param array $features   enabled or disabled features
     *
     * You can pass an array of features to disable some of them for performance improvement.
     * E.g.
     * $features = array(
     *     'smart_quotes' => false,
     *     'smart_dashes' => false
     * )
     */
    public function __construct(array $features = array())
    {
        $this->features = array_merge($this->features, $features);
        $attr = '';
        
        if ($v = $this->features['smart_quotes']) {
            switch ($v) {
                case 2:  $attr .= 'qb'; break;
                case 3:  $attr .= 'qB'; break;
                default: $attr .= 'q';  break;
            }
        }
        if ($v = $this->features['smart_dashes']) {
            switch ($v) {
                case 2:  $attr .= 'D'; break;
                case 3:  $attr .= 'i'; break;
                default: $attr .= 'd'; break;
            }
        }
        if ($this->features['smart_elipsis']) {
            $attr .= 'e';
        }
        parent::__construct($attr);
    }
}
