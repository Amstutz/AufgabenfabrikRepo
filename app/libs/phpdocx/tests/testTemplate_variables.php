<?php

/**
 * Unit test. Template variables.
 *
 * @category   Phpdocx
 * @package    testing
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.2
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.2
 */
require_once('simpletest/autorun.php');
require_once('../classes/CreateDocx.inc');

class TestTemplateVariables extends UnitTestCase
{

    function testImageGenerate()
    {
        $docx = new CreateDocx();

        $docx->addTemplate('../examples/files/TemplateText.docx');
        
        $this->assertTrue(is_array($docx->getTemplateVariables()));
    }

}
