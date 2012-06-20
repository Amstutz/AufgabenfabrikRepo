<?php

/**
 * Unit test. Page title.
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

class TestPage_titlePage extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_page_title.docx');
        $docx = new CreateDocx();
        $paramsPage = array('titlePage' => 1);
        $docx->createDocx('test_page_title', $paramsPage);
        $this->assertTrue(file_exists('test_page_title.docx'));
        @unlink('test_page_title.docx');
    }

}
