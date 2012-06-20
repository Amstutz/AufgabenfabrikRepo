<?php

/**
 * Create a DOCX file. Shape example
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

$type = 'line';

$paramsShape = array(
    'width'     => 300,
    'height'    => 500
);

$docx->addShape($type, $paramsShape);

$docx->createDocx('example_shape');