<?php

/**
 * Unit test. Table color.
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

class testTable_color extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_table.docx');
        $docx = new CreateDocx();

        $title = array();
        $title[] =
            array(
                'text' => 'Title A',
                'b' => 'single',
                'cell_color' => 'C2F9B9'
        );

        $titleA = $docx->addElement('addText', $title);

        $title[0]['text'] = 'Title B';

        $titleB = $docx->addElement('addText', $title);

        $title[0]['text'] = 'Title C';

        $titleC = $docx->addElement('addText', $title);

        $title[0]['text'] = 'Title D';

        $titleD = $docx->addElement('addText', $title);

        $title[0]['text'] = 'Title E';

        $titleE = $docx->addElement('addText', $title);

        $valuesTable = array(
            array(
                $titleA,
                $titleB,
                $titleC,
                $titleD,
                $titleE
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
                'Value 25'
            )
        );

        $paramsTable = array();

        $docx->addTable($valuesTable, $paramsTable);
        $docx->createDocx('test_table');
        $this->assertTrue(file_exists('test_table.docx'));
        @unlink('test_table.docx');
    }

}
