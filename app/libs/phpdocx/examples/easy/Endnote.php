<?php

/**
 * Create a DOCX file. Enodnote example
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

$docx->addEndnote(
    array(
        'textDocument' => 'Lorem ipsum dolor sit amet',
        'textEndNote' => 'endnote',
        'font' => 'Arial'
    )
);

$docx->createDocx('example_endnote');