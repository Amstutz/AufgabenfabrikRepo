<?php

/**
 * Create a DOCX file. Text example
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage easy
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    1.8
 * @link       http://www.phpdocx.com
 * @since      File available since Release 1.8
 */
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

$paramsText = array(
    'b' => 'single',
    'font' => 'Arial',
    'lineSpacing' => 240
);

$docx->addText($text, $paramsText);

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

$paramsText = array(
    'b' => 'single',
    'font' => 'Arial',
    'lineSpacing' => 480
);

$docx->addText($text, $paramsText);

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

$paramsText = array(
    'b' => 'single',
    'font' => 'Arial',
    'lineSpacing' => 120
);

$docx->addText($text, $paramsText);

$docx->createDocx('example_text_linespacing');