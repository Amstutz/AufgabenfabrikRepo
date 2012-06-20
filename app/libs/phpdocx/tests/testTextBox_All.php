<?php

/**
 * Unit test. Tests textboxes.
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

class AllTests_TextBox extends TestSuite {

    function AllTests_TextBox() {
        $this->TestSuite('All tests');
        $this->addFile('testTextBox_tamX.php');
        $this->addFile('testTextBox_tamY.php');
        $this->addFile('testTextBox_tam.php');
        $this->addFile('testTextBox_simple.php');
        $this->addFile('testTextBox_align.php');
        $this->addFile('testTextBox_simple_font.php');
        $this->addFile('testTextBox_fillColor2.php');
        $this->addFile('testTextBox_jc.php');
        $this->addFile('testTextBox_margin.php');
    }

}
