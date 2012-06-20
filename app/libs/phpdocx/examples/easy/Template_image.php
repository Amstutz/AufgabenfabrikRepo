<?php

/**
 * Create a DOCX file. Template image example
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

$objDocx = new CreateDocx();

$objDocx->addTemplate('../files/TemplateImage.docx');

$objDocx->addTemplateImage('IMAGE', '../files/img/logo_phpdocx.gif');

$objDocx->createDocx('template_image');
