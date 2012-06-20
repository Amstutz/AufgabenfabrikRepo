<?php

/**
 * Unit test. List embedded.
 *
 * @category   Phpdocx
 * @package    testing
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    1.0
 * @link       http://www.phpdocx.com
 * @since      File available since Release 1.0
 */
require_once('simpletest/autorun.php');
require_once('../classes/CreateDocx.inc');

class testList_embedded extends UnitTestCase
{

    function testTextGenerate()
    {

        @unlink('test_list.docx');
        $docx = new CreateDocx();
        $paramsLink = array(
            'title' => 'Link to Google',
            'link' => 'http://www.google.es'
        );
        $link = $docx->addElement('addLink', $paramsLink);

        $paramsImage = array(
            'name' => '../examples/files/img/image.png'
        );

        $image = $docx->addElement('addImage', $paramsImage);

        $legends = array(
            'legend1' => array(10, 11, 12),
            'legend2' => array(0, 1, 2),
            'legend3' => array(40, 41, 42)
        );
        $paramsGraphic = array(
            'data' => $legends,
            'type' => 'pie3DChart',
            'title' => 'Title'
        );
        $graphic = $docx->addElement('addGraphic', $paramsGraphic);

        $text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,' .
            ' sed do eiusmod tempor incididunt ut labore et dolore ' .
            'magna aliqua. Ut enim ad minim veniam, quis nostrud ' .
            'exercitation ullamco laboris nisi ut aliquip ex ea ' .
            'commodo consequat. Duis aute irure dolor in reprehenderit ' .
            'in voluptate velit esse cillum dolore eu fugiat nulla ' .
            'pariatur. Excepteur sint occaecat cupidatat non proident, ' .
            'sunt in culpa qui officia deserunt mollit anim id ' .
            'est laborum.';
        $paramsText = array(
            'b' => 'single'
        );

        $paramsTextBox = array(
            array('text' => $text, 'args' => $paramsText),
            $paramsBox
        );
        $textBox = $docx->addElement('addTextBox', $paramsTextBox);


        $valuesList = array(
            'Line 1',
            array(
                'Line A',
                $link,
                $image,
                $graphic,
                $textBox,
                array(
                    'Subline a',
                    'Subline b',
                    'Subline c',
                    'Subline d',
                    'Subline e',
                ),
                'Line D',
            ),
            'Line 2',
            'Line 3',
        );

        $paramsList = array(
            'val' => 1
        );

        $docx->addList($valuesList, $paramsList);

        $docx->createDocx('test_list');
        $this->assertTrue(file_exists('test_list.docx'));
        @unlink('test_list.docx');
    }

}
