<?php

/** Unit test. Tests properties.
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

class AllTests_Properties extends TestSuite
{

    function AllTests_Properties()
    {
        $this->TestSuite('All tests');
        $this->addFile('testProperties_core.php');
        $this->addFile('testProperties_app.php');
        $this->addFile('testProperties_custom.php');
    }

}
