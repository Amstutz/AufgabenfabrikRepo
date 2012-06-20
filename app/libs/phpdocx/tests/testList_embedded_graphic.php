<?php

/**
 * Unit test. List embedded graphic.
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

class testList_embedded_graphic extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_list.docx');
        $docx = new CreateDocx();
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

        $valuesList = array(
            'Line 1',
            array(
                'Line A',
                $graphic,
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
