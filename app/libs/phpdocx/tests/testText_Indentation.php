<?php

/** Unit test. Text indentation.
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
require_once('../classes/CreateDocx.inc');

class TestTextIndentation extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_text.docx');
        $docx = new CreateDocx();
        $paramsText = array(
            'spaces' => 4,
        );
        $docx->addText(
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
            'sed do eiusmod tempor incididunt ut labore et dolore magna ' .
            'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ' .
            'ullamco laboris nisi ut aliquip ex ea commodo consequat. ' .
            'Duis aute irure dolor in reprehenderit in voluptate velit ' .
            'esse cillum dolore eu fugiat nulla pariatur. Excepteur sint ' .
            'occaecat cupidatat non proident, sunt in culpa qui officia ' .
            'deserunt mollit anim id est laborum.',
            $paramsText
        );

        $paramsText = array(
            'tabs' => 1,
        );

        $docx->addText(
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
            'sed do eiusmod tempor incididunt ut labore et dolore magna ' .
            'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ' .
            'ullamco laboris nisi ut aliquip ex ea commodo consequat. ' .
            'Duis aute irure dolor in reprehenderit in voluptate velit ' .
            'esse cillum dolore eu fugiat nulla pariatur. Excepteur sint ' .
            'occaecat cupidatat non proident, sunt in culpa qui officia ' .
            'deserunt mollit anim id est laborum.',
            $paramsText
        );

        $docx->createDocx('test_text');
        $this->assertTrue(file_exists('test_text.docx'));
        @unlink('test_text.docx');
    }

}
