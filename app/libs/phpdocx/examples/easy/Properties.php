<?php

/**
 * Create a DOCX file. Properties example
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage easy
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.2
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.2
 */
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$paramsProperties = array(
    'title' => 'my title',
    'subject' => 'my subject',
    'creator' => 'the creator',
    'keywords' => 'my keywords',
    'description' => 'my description',
    'category' => 'my category',
    'custom' => array(
        array(
            'title' => 'my title 1',
            'value' => 'my content 1'),
        array(
            'title' => 'my title 2',
            'value' => 'my content 2'),
        array(
            'title' => 'my title 3',
            'value' => 'my content 3')
    )
);
$docx->addProperties($paramsProperties);

$docx->createDocx('example_properties');