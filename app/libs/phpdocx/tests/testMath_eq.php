<?php

/**
 * Unit test. Math eq.
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

class TestMathEq extends UnitTestCase
{

    function testMathEqGenerate()
    {
        @unlink('test_math.docx');
        $docx = new CreateDocx();
        $docx->addMathEq(
            '<m:oMathPara><m:oMath><m:r><m:t>âˆªÂ±âˆž=~Ã—</m:t></m:r>' .
            '</m:oMath></m:oMathPara>'
        );

        $docx->createDocx('test_math');
        $this->assertTrue(file_exists('test_math.docx'));
        @unlink('test_math.docx');
    }

}
