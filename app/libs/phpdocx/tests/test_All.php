<?php

require_once('simpletest/autorun.php');

class TestsAll extends TestSuite {

    function TestsAll() {
        $this->TestSuite('All tests');
        $this->addFile('testBreak_All.php');
        $this->addFile('testEmbed_All.php');
        $this->addFile('testEndnotes_All.php');
        $this->addFile('testGraphic_All.php');
        $this->addFile('testImage_All.php');
        $this->addFile('testList_All.php');
        $this->addFile('testMath_All.php');
        $this->addFile('testPage_All.php');
        $this->addFile('testProperties_All.php');
        $this->addFile('testShape_All.php');
        $this->addFile('testTable_All.php');
        $this->addFile('testText_All.php');
        $this->addFile('testTextBox_All.php');
        $this->addFile('testTransformHTML.php');
    }

}
