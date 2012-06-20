<?php

/** Unit test. Embed HTML.
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

class TestEmbed_HTML extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_html.docx');
        $docx = new CreateDocx();
        $html= '<p><strong>PHPDOCX</strong> is a PHP library designed to generate completely dynamic and fully customizable Word documents.</p>';
        $docx->addHTML($html);
        $docx->createDocx('test_html');
        $this->assertTrue(file_exists('test_html.docx'));
        @unlink('test_html.docx');
    }

}
