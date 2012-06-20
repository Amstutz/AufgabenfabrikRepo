<?php

/** Unit test. Text multi.
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

class TestTextMulti extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_text.docx');

        $docx = new CreateDocx();

        $text = array();

        $text[] =
            array(
                'text' => 'Lorem ipsum ',
                'u' => 'single',
        );

        $text[] =
            array(
                'text' => ' sed do eiusmod tempor incididunt'
        );

        $docx->addText($text);

        $docx->createDocx('test_text');
        $this->assertTrue(file_exists('test_text.docx'));
        @unlink('test_text.docx');
    }

}
