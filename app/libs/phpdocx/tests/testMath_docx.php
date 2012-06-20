<?php

/**
 * Unit test. Math docx.
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

class TestMathDocx extends UnitTestCase
{

    function testMathEqGenerate()
    {
        @unlink('test_math.docx');
        $objDocx = new CreateDocx();
        $objDocx->addMathDocx('../docx/math.docx');

        $objDocx->createDocx('test_math');
        $this->assertTrue(file_exists('test_math.docx'));
        @unlink('test_math.docx');
    }

}
