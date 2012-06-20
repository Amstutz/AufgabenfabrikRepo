<?php

/**
 * Unit test. Footnote.
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

class TestEndNotes_footnote extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_endnotes.docx');
        $docx = new CreateDocx();

        $docx->addText(
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
            'sed do eiusmod tempor incididunt ut labore et dolore magna ' .
            'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ' .
            'ullamco laboris nisi ut aliquip ex ea commodo consequat. ' .
            'Duis aute irure dolor in reprehenderit in voluptate velit ' .
            'esse cillum dolore eu fugiat nulla pariatur. Excepteur ' .
            'sint occaecat cupidatat non proident, sunt in culpa qui ' .
            'officia deserunt mollit anim id est laborum.'
        );

        $docx->addFootnote(
            array(
                'textDocument' => 'Lorem ipsum dolor sit amet, consectetur' .
                    ' adipisicing elit, sed do eiusmod tempor incididunt ' .
                    'ut labore et dolore magna aliqua. Ut enim ad minim' .
                    ' veniam, quis nostrud exercitation ullamco laboris ' .
                    'nisi ut aliquip ex ea commodo consequat. Duis aute' .
                    ' irure dolor in reprehenderit in voluptate velit ' .
                    'esse cillum dolore eu fugiat nulla pariatur.',
                'textEndNote' => 'endnote'
            )
        );

        $docx->addText(
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
            'sed do eiusmod tempor incididunt ut labore et dolore magna ' .
            'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ' .
            'ullamco laboris nisi ut aliquip ex ea commodo consequat. ' .
            'Duis aute irure dolor in reprehenderit in voluptate velit ' .
            'esse cillum dolore eu fugiat nulla pariatur. Excepteur ' .
            'sint occaecat cupidatat non proident, sunt in culpa qui ' .
            'officia deserunt mollit anim id est laborum.'
        );

        $docx->createDocx('test_endnotes');
        $this->assertTrue(file_exists('test_endnotes.docx'));
        @unlink('test_endnotes.docx');
    }

}
