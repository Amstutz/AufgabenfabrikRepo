<?php

/**
 * Unit test. Footnote and endnote font.
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

class TestEndNotes_footnoteAndEndnote_font extends UnitTestCase
{

    function testTextGenerate()
    {
        @unlink('test_endnotes_font.docx');
        $docx = new CreateDocx();

        $docx->addText(
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
            'sed do eiusmod tempor incididunt ut labore et dolore magna ' .
            'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ' .
            'ullamco laboris nisi ut aliquip ex ea commodo consequat. ' .
            'Duis aute irure dolor in reprehenderit in voluptate velit ' .
            'esse cillum dolore eu fugiat nulla pariatur. Excepteur ' .
            'sint occaecat cupidatat non proident, sunt in culpa qui ' .
            'officia deserunt mollit anim id est laborum.',
            array('font' => 'Times New Roman')
        );

        $docx->addEndnote(
            array(
                'textDocument' => 'Lorem ipsum dolor sit amet, ' .
                    'consectetur adipisicing elit, sed do eiusmod ' .
                    'tempor incididunt ut labore et dolore magna aliqua. ' .
                    'Ut enim ad minim veniam, quis nostrud exercitation ' .
                    'ullamco laboris nisi ut aliquip ex ea commodo ' .
                    'consequat. Duis aute irure dolor in reprehenderit ' .
                    'in voluptate velit esse cillum dolore eu fugiat ' .
                    'nulla pariatur.',
                'textEndNote' => 'end text',
                'font' => 'Times New Roman'
            )
        );

        $docx->addFootnote(array(
                'textDocument' => 'Lorem ipsum dolor sit amet, ' .
                    'consectetur adipisicing elit, sed do eiusmod ' .
                    'tempor incididunt ut labore et dolore magna aliqua. ' .
                    'Ut enim ad minim veniam, quis nostrud exercitation ' .
                    'ullamco laboris nisi ut aliquip ex ea commodo ' .
                    'consequat. Duis aute irure dolor in reprehenderit ' .
                    'in voluptate velit esse cillum dolore eu fugiat ' .
                    'nulla pariatur.',
                'textEndNote' => 'end text',
                'font' => 'Times New Roman'
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
            'officia deserunt mollit anim id est laborum.',
            array('font' => 'Times New Roman')
        );

        $docx->createDocx('test_endnotes_font');
        $this->assertTrue(file_exists('test_endnotes_font.docx'));
        @unlink('test_endnotes_font.docx');
    }

}

