<?php

/**
 * Unit test. HTML.
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
require_once 'simpletest/autorun.php';
require_once '../classes/TransformDoc.inc';

class TestHMTL extends UnitTestCase
{

    function testHTMLGenerate()
    {
        @unlink('../files/testHTML_o.html');
        $document = new TransformDoc();
        $document->setStrFile('../examples/files/Text.docx');
        $document->generateXHTML();
        $document->validatorXHTML();
        $this->assertTrue($document->getStrXHTML());
    }

}
