<?php

/**
 * Unit test. Tests math.
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

class AllTests_Math extends TestSuite
{

    function AllTests_Math()
    {
        $this->TestSuite('All tests');
        $this->addFile('testMath_docx.php');
        $this->addFile('testMath_eq.php');
        $this->addFile('testMath_mml.php');
    }

}
