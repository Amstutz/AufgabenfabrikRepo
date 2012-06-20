<?php

/**
 * Unit test. Table embedded link.
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

class testTable_embedded_link extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_table.docx');
        $docx = new CreateDocx();
        $valuesLink = array(
            'title' => 'Link to Google',
            'link' => 'http://www.google.es'
        );

        $link = $docx->addElement('addLink', $valuesLink);


        $valuesTable = array(
            array(
                'Title A',
                'Title B',
                'Title C',
                'Title D',
                'Title E'
            ),
            array(
                'Line A',
                'Value 01',
                'Value 02',
                $link,
                'Value 04',
                'Value 05'
            ),
            array(
                'Line B',
                'Value 11',
                'Value 12',
                'Value 13',
                'Value 14',
                'Value 15'
            ),
            array(
                'Line C',
                'Value 21',
                'Value 22',
                'Value 23',
                'Value 24',
                'Value 25'
            )
        );

        $paramsTable = array(
            'TBLLOOKval' => 'ffff01E0',
            'TBLSTYLEval' => 'Tablanormal',
            'TBLWtype' => 'center',
            'TBLWw' => '50',
            'border' => 'single',
            'border_sz' => 20,
            'border_spacing' => 0,
            'border_color' => 'ff0000',
            'jc' => 'center',
            'size_col' => 1200
        );

        $docx->addTable($valuesTable, $paramsTable);
        $docx->createDocx('test_table');
        $this->assertTrue(file_exists('test_table.docx'));
        @unlink('test_table.docx');
    }

}
