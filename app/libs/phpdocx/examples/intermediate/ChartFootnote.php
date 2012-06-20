<?php

/**
 * Create a DOCX file. Footnotes in different objects
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage intermediate
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.2
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.2
 */
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua:';

$paramsText = array(
    'font' => 'Arial'
);

$docx->addText($text, $paramsText);

$legends = array(
    'legend1' => array(24),
    'legend2' => array(45),
    'legend3' => array(31)
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
    'font' => 'Times New Roman',
    'border' => 1
);
$docx->addGraphic($args);

$docx->addFootnote(
    array(
        'textDocument' => 'Lorem ipsum dolor sit amet',
        'textEndNote' => 'Curabitur id dui purus, sit amet blandit lacus. ' .
    					 'Vivamus mollis magna et risus molestie blandit. ' . 
    					 'Phasellus vel tortor quis metus consectetur.'
    )
);

$docx->addBreak('line');

$text = 'Cras eget porttitor sapien. Aenean tristique, nibh quis egestas ' . 
		'varius, erat neque sodales neque, quis bibendum sem lorem accumsan ' .
		'mauris. Aliquam justo justo, vulputate sed condimentum non, pharetra:';

$paramsText = array(
    'font' => 'Arial'
);

$docx->addText($text, $paramsText);

$paramsImg = array(
    'name' => '../files/img/image.png',
	'scaling' => 75,
    'textWrap' => 0,
    'border' => 1,
);

$docx->addImage($paramsImg);

$docx->addFootnote(
    array(
        'textDocument' => 'Aenean non gravida sapien',
        'textEndNote' => 'Nunc pretium bibendum dui id laoreet. Nunc ' .
    					 'venenatis. Duis quis lorem vel dui tincidunt ' . 
    					 'pellentesque quis sed diam.'
    )
);

$docx->createDocx('example_chart_footnotes');
