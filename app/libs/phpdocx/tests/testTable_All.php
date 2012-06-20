<?php

/**
 * Unit test. Tests tables.
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

class AllTests_Table extends TestSuite
{

    function AllTests_Table()
    {
        $this->TestSuite('All tests');
        $this->addFile('testTable_simple.php');
        $this->addFile('testTable_double.php');
        $this->addFile('testTable_embedded_link.php');
        $this->addFile('testTable_embedded_image.php');
        $this->addFile('testTable_embedded_graphic.php');
        $this->addFile('testTable_embedded.php');
        $this->addFile('testTable_embedded_graphic_font.php');
        $this->addFile('testTable_color.php');
    }

}
