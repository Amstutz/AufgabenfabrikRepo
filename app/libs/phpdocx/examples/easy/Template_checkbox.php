<?php

/**
 * Create a DOCX file. Template checkbox example
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage easy
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    05.27.2011
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.3
 */
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$docx->addTemplate('../files/TemplateCheckbox.docx');

$docx->addTemplateCheckBox('1', 'First');
$docx->addTemplateCheckBox('2', 'Second');
$docx->addTemplateCheckBox('3', 'Third');

$docx->createDocx('template_checkbox');
