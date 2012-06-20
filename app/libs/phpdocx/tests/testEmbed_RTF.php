<?php

/** Unit test. Embed RTF.
 *
 * @category   Phpdocx
 * @package    testing
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    24.05.2011
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.3
 */
require_once('simpletest/autorun.php');
require_once('../classes/CreateDocx.inc');

class TestEmbed_RTF extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_rtf.docx');
        $docx = new CreateDocx();
        $docx->addRTF('../examples/files/Text.rtf');
        $docx->createDocx('test_rtf');
        $this->assertTrue(file_exists('test_rtf.docx'));
        @unlink('test_rtf.docx');
    }

}
