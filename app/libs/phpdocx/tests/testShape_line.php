<?php

/** Unit test. Text bold.
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

class TestShape_line extends UnitTestCase
{

    function testShapeGenerate()
    {
        @unlink('test_shape.docx');
        $docx = new CreateDocx();
		$paramsShape = array(
		    'width'     => 300,
		    'height'    => 500
		);
        $docx->addShape(
            'line',
            $paramsShape
        );

        $docx->createDocx('test_shape');
        $this->assertTrue(file_exists('test_shape.docx'));
        @unlink('test_shape.docx');
    }

}
