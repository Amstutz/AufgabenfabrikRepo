<?php

/**
 * Unit test. Tests images.
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

class AllTests_Image extends TestSuite
{

    function AllTests_Image()
    {
        $this->TestSuite('All tests');
        $this->addFile('testImage_simple.php');
        $this->addFile('testImage_AjusteTextoArribaAbajo.php');
        $this->addFile('testImage_AjusteTextoCuadrado.php');
        $this->addFile('testImage_AjusteTextoDelanteTexto.php');
        $this->addFile('testImage_AjusteTextoDetrasTexto.php');
        $this->addFile('testImage_AjusteTextoTransparente.php');
        $this->addFile('testImage_border.php');
        $this->addFile('testImage_borderDiscontinuo.php');
        $this->addFile('testImage_sinAjusteTexto.php');
        $this->addFile('testImage_size.php');
        $this->addFile('testImage_sizeX.php');
        $this->addFile('testImage_sizeY.php');
        $this->addFile('testImage_spacing.php');
        $this->addFile('testImage_spacingBottom.php');
        $this->addFile('testImage_spacingLeft.php');
        $this->addFile('testImage_spacingRight.php');
        $this->addFile('testImage_spacingTop.php');
        $this->addFile('testImage_AlignRight.php');
        $this->addFile('testImage_AlignCenter.php');
    }

}
