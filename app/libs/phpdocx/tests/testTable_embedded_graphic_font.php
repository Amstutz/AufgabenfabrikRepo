<?php

/**
 * Unit test. Table embedded graphic font.
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

class testTable_embedded_graphic_font extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_table_font.docx');
        $docx = new CreateDocx();
        $legends = array(
            'legend1' => array(10, 11, 12),
            'legend2' => array(0, 1, 2),
            'legend3' => array(40, 41, 42)
        );
        $paramsGraphic = array(
            'data' => $legends,
            'type' => 'pie3DChart',
            'title' => 'title',
            'font' => 'Times New Roman'
        );
        $graphic = $docx->addElement('addGraphic', $paramsGraphic);


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
                'Value 03',
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
                $graphic
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
            'size_col' => 1200, 'font' => 'Times New Roman'
        );

        $docx->addTable($valuesTable, $paramsTable);

        $docx->createDocx('test_table_font');
        $this->assertTrue(file_exists('test_table_font.docx'));
        @unlink('test_table_font.docx');
    }

}
