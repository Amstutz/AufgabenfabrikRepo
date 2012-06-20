<?php

/**
 * Create a DOCX file. Header and footer with font styles
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
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$paramsHeader = array(
    'name' => '../files/img/image.png',
    'jc' => 'right',
    'textWrap' => 5,
    'font' => 'Arial'
);

$docx->addHeader('Header Arial', $paramsHeader);

$paramsHeader = array(
    'font' => 'Times New Roman'
);

$docx->addHeader('Header Times New Roman', $paramsHeader);

$paramsFooter = array(
    'pager' => 'true',
    'pagerAlignment' => 'center',
    'font' => 'Arial'
);

$docx->addFooter('Footer Arial', $paramsFooter);

$paramsFooter = array(
    'font' => 'Times New Roman'
);

$docx->addFooter('Footer Times New Roman', $paramsFooter);
$docx->createDocx('example_header_and_footer');
