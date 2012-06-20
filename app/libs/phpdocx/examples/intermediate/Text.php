<?php

/**
 * Create a DOCX file. Text with different styles in the same paragraph
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage intermediate
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    1.8
 * @link       http://www.phpdocx.com
 * @since      File available since Release 1.8
 */
require_once('../../classes/CreateDocx.inc');

$docx = new CreateDocx();

$text = array();

$text[] =
    array(
        'text' => 'Lorem ipsum',
        'u' => 'single',
);

$text[] =
    array(
        'text' => ' sed do eiusmod tempor incididunt',
        'b' => 'single',
);

$docx->addText($text);

$docx->createDocx('example_text');