<?php

/**
 * Create a DOCX file. Custom Bullets List example
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

$valuesList = array(
    'Line 1',
    'Line 2',
    'Line 3',
    'Line 4',
    'Line 5'
);

$paramsList = array(
    'val' => 1,
    'bullets' => array(3)
);

$docx->addList($valuesList, $paramsList);

$docx->createDocx('example_list_bullets');