<?php

/** Unit test. Textbox simple font.
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

class TestTextBox_simple_font extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_textbox_font.docx');
        $docx = new CreateDocx();
        $paramsText = array('font' => 'Times New Roman');
        $paramsTextBox = array(
        );

        $docx->addTextBox(
            array('text' => $texto, 'args' => $paramsText),
            $paramsTextBox
        );

        $docx->createDocx('test_textbox_font');
        $this->assertTrue(file_exists('test_textbox_font.docx'));
        @unlink('test_textbox_font.docx');
    }

}
