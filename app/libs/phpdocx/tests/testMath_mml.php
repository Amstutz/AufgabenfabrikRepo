<?php

/**
 * Unit test. Math MML.
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

class TestMathMML extends UnitTestCase
{

    function testMathEqGenerate()
    {
        @unlink('test_math.docx');
        $docx = new CreateDocx();

        $docx->addMathMML(
            '<math xmlns="http://www.w3.org/1998/Math/MathML"><mrow>' .
            '<mi>A</mi><mo>=</mo><mfenced open="[" close="]"><mtable>' .
            '<mtr><mtd><mi>x</mi></mtd><mtd><mn>2</mn></mtd></mtr> ' .
            '<mtr><mtd><mn>3</mn></mtd><mtd><mi>w</mi></mtd></mtr>' .
            '</mtable></mfenced></mrow></math>'
        );

        $docx->createDocx('test_math');
        $this->assertTrue(file_exists('test_math.docx'));
        @unlink('test_math.docx');
    }

}
