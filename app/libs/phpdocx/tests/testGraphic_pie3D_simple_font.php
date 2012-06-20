<?php

/**
 * Unit test. Graphic pie3D simple font.
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

class TestGraphic_pie3D_simple_font extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_text_font.docx');
        $docx = new CreateDocx();
        $legends = array(
            'legend1' => array(10, 11, 12),
            'legend2' => array(0, 1, 2),
            'legend3' => array(40, 41, 42)
        );
        $args = array('data' => $legends,
            'type' => 'pie3DChart',
            'font' => 'Times New Roman'
        );

        $docx->addGraphic($args);
        $docx->createDocx('test_text_font');
        $this->assertTrue(file_exists('test_text_font.docx'));
        @unlink('test_text_font.docx');
    }

}
