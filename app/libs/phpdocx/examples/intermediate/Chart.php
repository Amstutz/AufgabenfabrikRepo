<?php

/**
 * Create a DOCX file. Two charts in the same DOCX
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

$legends = array(
    'legend1' => array(10),
    'legend2' => array(0),
    'legend3' => array(40)
);
$args = array(
    'data' => $legends,
    'type' => 'pie3DChart',
    'title' => 'Title first chart',
    'cornerX' => 20, 'cornerY' => 20, 'cornerP' => 30,
    'color' => 2,
    'textWrap' => 0,
    'sizeX' => 10, 'sizeY' => 10,
    'jc' => 'left',
    'showPercent' => 1,
    'font' => 'Times New Roman'
);
$docx->addGraphic($args);

$legends = array(
    'legend' => array('sequence 1', 'sequence 2', 'sequence 3'),
    'Category 1' => array(9.3, 2.4, 2),
    'Category 2' => array(2.5, 4.4, 1),
    'Category 3' => array(3.5, 1.8, 0.5),
    'Category 4' => array(1.5, 8, 1)
);
$args = array(
    'data' => $legends,
    'type' => 'colChart',
    'title' => 'Title second chart',
    'color' => 2,
    'textWrap' => 0,
    'sizeX' => 17, 'sizeY' => 7,
    'jc' => 'center',
    'font' => 'Arial'
);
$docx->addGraphic($args);

$docx->createDocx('example_chart');
