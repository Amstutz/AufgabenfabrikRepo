<?php

/**
 * Create a DOCX file. Template HTML example
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage easy
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    05.25.2011
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2,3
 */
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$docx->addTemplate('../files/TemplateText.docx');

$docx->addTemplateVariable('WEIGHT1', '10');
$docx->addTemplateVariable('WEIGHT2', '20');
$docx->addTemplateVariable('WEIGHT3', '25');

$docx->addTemplateVariable('PRICE1', '5');
$docx->addTemplateVariable('PRICE2', '30');
$docx->addTemplateVariable('PRICE3', '7');

$docx->addTemplateVariable('TOTALWEIGHT', '55');

$docx->addTemplateVariable('TOTALPRICE', '42');

$docx->addTemplateVariable('NAME',
                           '<strong>David Hume</strong><br />
                           <em>Character is the result of a system of stereotyped principles.</em>',
                           'html');

$docx->createDocx('template_html_text');