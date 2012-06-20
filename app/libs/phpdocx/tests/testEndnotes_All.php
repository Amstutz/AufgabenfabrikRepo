<?php

/**
 * Unit test. Tests endnote.
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

class AllTests_Endnotes extends TestSuite {

    function AllTests_Endnotes() {
        $this->TestSuite('All tests');
        $this->addFile('testEndNotes_simple.php');
        $this->addFile('testEndNotes_complicated.php');
        $this->addFile('testEndNotes_footnote.php');
        $this->addFile('testEndNotes_footnoteAndEndnote.php');
        $this->addFile('testEndNotes_footnoteAndEndnote_font.php');
    }

}
