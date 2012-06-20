<?php

/**
 * Unit test. Tests graphic.
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

class AllTests_Embed extends TestSuite
{

    function AllTests_Embed()
    {
        $this->TestSuite('All tests');
        $this->addFile('testEmbed_DOCX.php');
        $this->addFile('testEmbed_HTML.php');
        $this->addFile('testEmbed_RTF.php');
    }

}
