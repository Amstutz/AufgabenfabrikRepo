<?php

/**
 * Create a DOCX file. List with image, list, chart and textbox
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

$paramsLink = array(
    'title' => 'Link to Google',
    'link' => 'http://www.google.es'
);

$link = $docx->addElement('addLink', $paramsLink);


$paramsImage = array(
    'name' => '../files/img/image.png'
);

$image = $docx->addElement('addImage', $paramsImage);

$legends = array(
    'legend1' => array(10, 11, 12),
    'legend2' => array(0, 1, 2),
    'legend3' => array(40, 41, 42)
);

$paramsChart = array(
    'data' => $legends,
    'type' => 'pie3DChart',
    'title' => 'Title'
);
$chart = $docx->addElement('addGraphic', $paramsChart);

$paramsText = array(
    'b' => 'single'
);

$paramsBox = array(
    'jc' => 'square'
);

$paramsTextBox = array(
    array(
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing ' .
                  'elit, sed do eiusmod tempor incididunt ut labore et ' .
                  'dolore magna aliqua. Ut enim ad minim veniam, quis ' .
                  'nostrud exercitation ullamco laboris nisi ut aliquip ' .
                  'ex ea commodo consequat. Duis aute irure dolor in ' .
                  'reprehenderit in voluptate velit esse cillum dolore ' .
                  'eu fugiat nulla pariatur. Excepteur sint occaecat ' .
                  'cupidatat non proident, sunt in culpa qui officia ' .
                  'deserunt mollit anim id est laborum.',
        'args' => $paramsText
    ),
    $paramsBox
);

$textBox = $docx->addElement('addTextBox', $paramsTextBox);

$valuesList = array(
    'Line 1',
    $link,
    $image,
    $chart,
    'Line 2',
    'Line 3',
    $textBox,
);
$paramsList = array(
    'val' => 1
);
$docx->addList($valuesList, $paramsList);

$docx->createDocx('example_list');
