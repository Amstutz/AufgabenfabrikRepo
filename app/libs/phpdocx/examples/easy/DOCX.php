<?php

/**
 * Create a DOCX file. Add HTML code in a DOCX file
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage easy
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
// *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    05.24.2011
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.3
 */
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$docx->addText('DOCX content');

$docx->addDOCX('../files/Text.docx');

$docx->addText('End DOCX content');

$docx->createDocx('example_docx');
