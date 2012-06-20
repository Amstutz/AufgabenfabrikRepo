<?php

/**
 * Create a DOCX file. Footer Paginator example
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
require_once('../../classes/CreateDocx.inc');

$docx = new CreateDocx();

$docx->addText('Page 1 Content');
$docx->addBreak('page');

$docx->addText('Page 2 Content');
$docx->addBreak('page');

$docx->addText('Page 3 Content');

$paramsFooter = array(
    'font' => 'Arial',
	'pager' => 'true',
	'pagerAlignment' => 'right'
);

$docx->addFooter('Footer. Arial font', $paramsFooter);

$docx->createDocx('example_footer_pager');