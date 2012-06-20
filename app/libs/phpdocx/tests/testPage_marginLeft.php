<?php

/**
 * Unit test. Page margin left.
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

class TestPage_marginLeft extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_page.docx');
        $docx = new CreateDocx();
        $paramsPage = array('left' => 4000);
        $docx->createDocx('test_page', $paramsPage);
        $this->assertTrue(file_exists('test_page.docx'));
        @unlink('test_page.docx');
    }

}
