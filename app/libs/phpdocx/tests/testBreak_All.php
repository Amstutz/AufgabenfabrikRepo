<?php

require_once('simpletest/autorun.php');

class AllTests_Break extends TestSuite {

    function AllTests_Break() {
        $this->TestSuite('All tests');
        $this->addFile('testBreak_line.php');
        $this->addFile('testBreak_page.php');
    }

}
?>
