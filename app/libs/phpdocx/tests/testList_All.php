<?php

/**
 * Unit test. Tests lists.
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

class AllTests_List extends TestSuite
{

    function AllTests_List()
    {
        $this->TestSuite('All tests');
        $this->addFile('testList_simple.php');
        $this->addFile('testList_double.php');
        $this->addFile('testList_threesome.php');
        $this->addFile('testList_embedded_link.php');
        $this->addFile('testList_embedded_image.php');
        $this->addFile('testList_embedded_graphic.php');
        $this->addFile('testList_embedded_textbox.php');
        $this->addFile('testList_embedded_textbox_font.php');
        $this->addFile('testList_embedded.php');
    }

}
