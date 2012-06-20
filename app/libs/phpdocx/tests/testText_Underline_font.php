<?php

/**
 * Unit test. Textbox underline font.
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

class TestText_Underline_font extends UnitTestCase {

    function testTextGenerate() {
        @unlink('test_text_font.docx');
        $docx = new CreateDocx();
        $paramsText = array(
            'u' => 'single',
            'font' => 'Times New Roman'
        );
        $docx->addText(
            'Lorem ipsum dolor sit amet, consectetur adipisicing', $paramsText
        );
        $docx->createDocx('test_text_font');
        $this->assertTrue(file_exists('test_text_font.docx'));
        @unlink('test_text_font.docx');
    }

}
