<?php

/**
 * Unit test. Graphic bar3D corners.
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

class TestGraphic_bar3D_corners extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_graphic.docx');
        $objDocx = new CreateDocx();
        $legends = array(
            'legend' => array('sublegend1', 'sublegend2', 'sublegend3'),
            'legend1' => array(10, 11, 12),
            'legend2' => array(0, 1, 2),
            'legend3' => array(40, 41, 42)
        );
        $args = array(
            'data' => $legends,
            'type' => 'bar3DChart',
            'cornerX' => 20, 'cornerY' => 20, 'cornerP' => 30
        );

        $objDocx->addGraphic($args);
        $objDocx->createDocx('test_graphic');
        $this->assertTrue(file_exists('test_graphic.docx'));
        @unlink('test_graphic.docx');
    }

}
