<?php

/** Unit test. Tests texts.
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

class AllTests_Text extends TestSuite
{

    function AllTests_Text()
    {
        $this->TestSuite('All tests');
        $this->addFile('testText_Bold.php');
        $this->addFile('testText_DoubleRight.php');
        $this->addFile('testText_Italic.php');
        $this->addFile('testText_Multi.php');
        $this->addFile('testText_Underline.php');
        $this->addFile('testText_Underline_font.php');
        $this->addFile('testText_Indentation.php');
    }

}
