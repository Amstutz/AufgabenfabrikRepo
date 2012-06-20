<?php

/** Unit test. Textbox size Y.
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

class TestTextBox_tamY extends UnitTestCase {

    function testTextGenerate() {
        @unlink('test_text.docx');
        $docx = new CreateDocx();
        $paramsBox = array(
            'height' => 100
        );

        $docx->addTextBox(
            array('text' => $text, 'args' => $paramsText),
            $paramsBox
        );

        $docx->createDocx('test_text');
        $this->assertTrue(file_exists('test_text.docx'));
        @unlink('test_text.docx');
    }

}
