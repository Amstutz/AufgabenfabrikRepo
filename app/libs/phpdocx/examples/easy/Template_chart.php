<?php

/**
 * Create a DOCX file. Template chart example
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

$docx->addTemplate('../files/TemplateChart.docx');

$legends = array(
    'legend1' => array(10, 11, 12),
    'legend2' => array(30, 21, 12),
    'legend3' => array(40, 41, 42)
);

$paramsChart =
    array(
        'data' => $legends,
        'type' => 'pie3DChart',
        'title' => 'Title',
        'cornerX' => 20,
        'cornerY' => 20,
        'cornerP' => 30,
        'color' => 2,
        'textWrap' => 0,
        'sizeX' => 10,
        'sizeY' => 10,
        'jc' => 'right',
        'showPercent' => 1,
        'font' => 'Times New Roman'
    );

$docx->addTemplateChart('PIECHART', $paramsChart);

$docx->createDocx('template_chart');
