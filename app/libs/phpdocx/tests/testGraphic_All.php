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

class AllTests_Graphic extends TestSuite
{

    function AllTests_Graphic()
    {
        $this->TestSuite('All tests');
        $this->addFile('testGraphic_bar3D_cornerP.php');
        $this->addFile('testGraphic_bar3D_corners.php');
        $this->addFile('testGraphic_bar3D_cornerX.php');
        $this->addFile('testGraphic_bar3D_cornerY.php');
        $this->addFile('testGraphic_bar3D_simple.php');
        $this->addFile('testGraphic_bar_agrupado.php');
        $this->addFile('testGraphic_bar_agrupado2.php');
        $this->addFile('testGraphic_bar_ajusteTextoCuadrado.php');
        $this->addFile('testGraphic_bar_color1.php');
        $this->addFile('testGraphic_bar_color2.php');
        $this->addFile('testGraphic_bar_justificadoC.php');
        $this->addFile('testGraphic_bar_justificadoD.php');
        $this->addFile('testGraphic_bar_simple.php');
        $this->addFile('testGraphic_bar_SinAjusteTexto.php');
        $this->addFile('testGraphic_bar_tam.php');
        $this->addFile('testGraphic_bar_tamX.php');
        $this->addFile('testGraphic_bar_tamY.php');
        $this->addFile('testGraphic_bar_title.php');
        $this->addFile('testGraphic_line3D_simple.php');
        $this->addFile('testGraphic_line_simple.php');
        $this->addFile('testGraphic_pie3D_simple.php');
        $this->addFile('testGraphic_pie_simple.php');
        $this->addFile('testGraphic_pie_porcentajes.php');
        $this->addFile('testGraphic_pie3D_simple_font.php');
    }

}
