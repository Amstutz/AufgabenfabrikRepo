<?php

/**
 * Unit test. PDF.
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
require_once('../classes/TransformDoc.inc');

class TestPDF extends UnitTestCase
{

    function testPDFGenerate()
    {
        @unlink('../files/testPDF_o.pdf');
        $document = new TransformDoc();
        $document->setStrFile('../files/test.docx');
        $this->assertTrue($document->fGeneratePDF());
    }

}
