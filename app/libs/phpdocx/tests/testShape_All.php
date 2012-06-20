<?php

/** Unit test. Tests texts.
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

class AllTests_Shape extends TestSuite
{

    function AllTests_Shape()
    {
        $this->TestSuite('All tests');
        $this->addFile('testShape_line.php');
    }

}
