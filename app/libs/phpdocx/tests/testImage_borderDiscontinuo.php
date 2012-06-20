<?php

/**
 * Unit test. Image border discontinuous.
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

class TestImageBorderDiscontinuo extends UnitTestCase
{

    function testImageGenerate()
    {
        @unlink('test_image.docx');
        $docx = new CreateDocx();

        $paramsImage = array(
            'name' => '../examples/files/img/image.png', 'border' => 8
        );

        $docx->addImage($paramsImage);
        $docx->createDocx('test_image');
        $this->assertTrue(file_exists('test_image.docx'));
        @unlink('test_image.docx');
    }

}
