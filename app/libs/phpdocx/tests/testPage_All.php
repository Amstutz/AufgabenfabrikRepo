<?php

/**
 * Unit test. Tests pages.
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

class AllTests_Page extends TestSuite
{

    function AllTests_Page()
    {
        $this->TestSuite('All tests');
        $this->addFile('testPage_simple.php');
        $this->addFile('testPage_marginTop.php');
        $this->addFile('testPage_marginLeft.php');
        $this->addFile('testPage_marginRight.php');
        $this->addFile('testPage_marginBottom.php');
        $this->addFile('testPage_margins.php');
        $this->addFile('testPage_titlePage.php');
    }

}
