<?php

/**
 * Create tables
 *
 * @category   Phpdocx
 * @package    elements
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    1.0
 * @link       http://www.phpdocx.com
 * @since      File available since Release 1.0
 */
include_once dirname(__FILE__) . '/CreateElement.inc';

/**
 * Create tables
 *
 * @category   Phpdocx
 * @package    elements
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    1.0
 * @link       http://www.phpdocx.com
 * @since      Class available since Release 1.0
 */
class CreateTable extends CreateElement
{

    /**
     * @access private
     * @var CreateTable
     * @static
     */
    private static $_instance = NULL;

    /**
     * Construct
     *
     * @access public
     */
    public function __construct()
    {

    }

    /**
     * Destruct
     *
     * @access public
     */
    public function __destruct()
    {
        
    }

    /**
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        $this->cleanTemplate();
        return $this->_xml;
    }

    /**
     *
     * @access public
     * @return CreateTable
     * @static
     */
    public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CreateTable();
        }
        return self::$_instance;
    }

    /**
     * Create table
     *
     * @access public
     * @param array args[0]
     */
    public function createTable()
    {
        $this->_xml = '';
        $args = func_get_args();

        if (is_array($args[0])) {
            $this->generateTBL();
            $this->generateTBLPR();
            if (!empty($args[1]['TBLSTYLEval'])) {
                $this->generateTBLSTYLE($args[1]['TBLSTYLEval']);
            } else {
                $this->generateTBLSTYLE();
            }
            if (!empty($args[1]['jc'])) $this->generateJC($args[1]['jc']);
            $tblWtype = 'auto';
            if (!empty($args[1]['TBLWtype'])) $tblWtype = $args[1]['TBLWtype'];
            $this->generateTBLW($tblWtype, $args[1]['TBLWw']);
            if (!empty($args[1]['border'])) {
                $this->generateTBLBORDERS();
                $sz = 4;
                if (!empty($args[1]['border_sz'])) $sz = $args[1]['border_sz'];
                $color = 'auto';
                if (!empty($args[1]['border_color']))
                        $color = $args[1]['border_color'];
                $spacing = '0';
                if (!empty($args[1]['border_spacing']))
                        $spacing = $args[1]['border_spacing'];

                $border = $args[1]['border'];
                $this->generateTBLBOTTOM($border, $sz, $spacing, $color);
                $this->generateTBLLEFT($border, $sz, $spacing, $color);
                $this->generateTBLTOP($border, $sz, $spacing, $color);
                $this->generateTBLRIGHT($border, $sz, $spacing, $color);
                $this->generateTBLINSIDEH($border, $sz, $spacing, $color);
                $this->generateTBLINSIDEV($border, $sz, $spacing, $color);
            }

            $this->generateTBLLOOK($args[1]['TBLLOOKval']);
            $this->generateTBLOVERLAP();
            $intLine = 0;
            foreach ($args[0] as $datDepth) {
                $this->generateTR();
                $this->generateTRPR();
                $intLine++;
                foreach ($datDepth as $cont) {
                    if (is_array($cont)) {
                        if ($cont['height']) {
                            $this->generateTRHEIGHT($cont['height']);
                        }
                        continue;
                    } else {
                        $this->cleanTemplateTRPR();
                    }
                    $this->generateTC();
                    $this->generateTCPR();
                    if (!empty($args[1]['size_col'])) {
                        $this->generateTCW($args[1]['size_col']);
                    }
                    if ($cont instanceof CreateText) {
                        if (!empty($cont->arrEmbeddedText[0]['cell_color'])) {
                            $this->generateSHD(
                                'solid',
                                $cont->arrEmbeddedText[0]['cell_color']
                            );
                        }
                    } else {
                        $this->generateSHD();
                    }
                    $this->generateP();
                    if ($cont instanceof CreateLink) {
                        $cont->createEmbeddedLink(
                            $cont->getTitle(),
                            $cont->getLink()
                        );
                        $this->addList((string) $cont);
                    } elseif ($cont instanceof CreateImage) {
                        $cont->createEmbeddedImage('table');
                        $this->addList((string) $cont);
                    } elseif ($cont instanceof CreateGraphic) {
                        $cont->createEmbeddedGraphic('table');
                        $this->addList((string) $cont);
                    } elseif ($cont instanceof CreateList) {
                        $cont->createEmbeddedList('table');
                        $posIni = strpos((string) $cont, '>');
                        $posFin = strrpos((string) $cont, '<');
                        $strList = substr(
                            (string) $cont,
                            $posIni + 1,
                            $posFin - $posIni - 1
                        );
                        $this->addList($strList);
                    } elseif ($cont instanceof CreateText) {
                        $cont->createEmbeddedText($cont);
                        $this->addList((string) $cont);
                    } else {
                        $this->generateR();
                        if ($args[1]['font'] != '') {
                            $this->generateRPR();
                            $this->generateRFONTS($args[1]['font']);
                        }
                        $this->generateT($cont);
                    }
                }
                $this->cleanTemplateR();
            }
        }
    }

    /**
     * Add list
     *
     * @param string $list
     * @access protected
     */
    protected function addList($list)
    {
        $this->_xml = str_replace('__GENERATEP__', $list, $this->_xml);
    }

    /**
     * Generate w:gridcols
     *
     * @param string $w
     * @access protected
     */
    protected function generateGRIDCOLS($w)
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':tblGrid ' .
            CreateElement::NAMESPACEWORD . ':w="' . $w . '"></' .
            CreateElement::NAMESPACEWORD . ':tblGrid>__GENERATEGRIDCOLS__';
        $this->_xml = str_replace('__GENERATEGRIDCOLS__', $xml, $this->_xml);
    }

    /**
     * Generate w:hmerge
     *
     * @access protected
     * @deprecated
     * @param string $val
     */
    protected function generateHMERGE($val = '')
    {

    }

    /**
     * Generate w:jc
     *
     * @param string $val
     * @access protected
     */
    protected function generateJC($val = '')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':jc ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':jc>';
        $this->_xml = str_replace('__GENERATEJC__', $xml, $this->_xml);
    }

    /**
     * Generate w:p
     *
     * @access protected
     */
    protected function generateP()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':p >__GENERATEP__</' .
            CreateElement::NAMESPACEWORD . ':p>';
        $this->_xml = str_replace('__GENERATETC__', $xml, $this->_xml);
    }

    /**
     * Generate w:shd
     *
     * @param string $val
     * @param string $color
     * @param string $fill
     * @param string $bgcolor
     * @param string $themeFill
     * @access protected
     */
    protected function generateSHD($val = 'horz-cross', $color = 'ff0000',
                                   $fill = '', $bgcolor = '', $themeFill = '')
    {
        $xmlAux = '<' . CreateElement::NAMESPACEWORD . ':shd w:val="' .
            $val . '"';
        if ($color != '') $xmlAux .= ' w:color="' . $color . '"';
        if ($fill != '') $xmlAux .= ' w:fill="' . $fill . '"';
        if ($bgcolor != '') $xmlAux .= ' wx:bgcolor="' . $bgcolor . '"';
        if ($themeFill != '') $xmlAux .= ' w:themeFill="' . $themeFill . '"';
        $xmlAux .= '></' . CreateElement::NAMESPACEWORD . ':shd>';
        $this->_xml = str_replace('__GENERATETCPR__', $xmlAux, $this->_xml);
    }

    /**
     * Generate w:tblborders
     *
     * @access protected
     */
    protected function generateTBLBORDERS()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':tblBorders>__GENERATETBLBORDER__</' .
            CreateElement::NAMESPACEWORD . ':tblBorders>';
        $this->_xml = str_replace('__GENERATETBLBORDERS__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblbottom
     *
     * @param string $val
     * @param string $sz
     * @param string $space
     * @param string $color
     * @access protected
     */
    protected function generateTBLBOTTOM($val="single", $sz="4", $space='0',
                                         $color='auto')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':bottom ' . CreateElement::NAMESPACEWORD .
            ':val="' . $val . '" ' . CreateElement::NAMESPACEWORD .
            ':sz="' . $sz . '" ' . CreateElement::NAMESPACEWORD .
            ':space="' . $space . '" ' . CreateElement::NAMESPACEWORD .
            ':color="' . $color . '"></' . CreateElement::NAMESPACEWORD .
            ':bottom>__GENERATETBLBORDER__';
        $this->_xml = str_replace('__GENERATETBLBORDER__', $xml, $this->_xml);
    }

    /**
     * Generate w:tbl
     *
     * @access protected
     */
    protected function generateTBL()
    {
        $this->_xml = '<' . CreateElement::NAMESPACEWORD .
            ':tbl>__GENERATETBL__</' . CreateElement::NAMESPACEWORD .
            ':tbl>';
    }

    /**
     * Generate w:tblstyle
     *
     * @param string $strVal
     * @access protected
     */
    protected function generateTBLSTYLE($strVal = 'Tablaconcuadrcula')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':tblStyle ' . CreateElement::NAMESPACEWORD .
            ':val="' . $strVal . '"></' . CreateElement::NAMESPACEWORD .
            ':tblStyle>';
        $this->_xml = str_replace('__GENERATETBLSTYLE__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblcellspacing
     *
     * @param string $w
     * @param string $type
     * @access protected
     */
    protected function generateTBLCELLSPACING($w = '', $type = '')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':tblCellSpacing ' . CreateElement::NAMESPACEWORD .
            ':w="' . $w . '" ' . CreateElement::NAMESPACEWORD .
            ':type="' . $type . '"></' . CreateElement::NAMESPACEWORD .
            ':tblCellSpacing>';
        $this->_xml = str_replace(
            '__GENERATETBLCELLSPACING__', $xml, $this->_xml
        );
    }

    /**
     * Generate w:tblgrid
     *
     * @access protected
     */
    protected function generateTBLGRID()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':tblGrid>__GENERATEGRIDCOLS__</' .
            CreateElement::NAMESPACEWORD .
            ':tblGrid>__GENERATETBL__';
        $this->_xml = str_replace('__GENERATETBL__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblinsideh
     *
     * @param string $val
     * @param string $sz
     * @param string $space
     * @param string $color
     * @access protected
     */
    protected function generateTBLINSIDEH($val = "single", $sz = "4",
                                          $space = '0', $color = 'auto')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':insideH ' . CreateElement::NAMESPACEWORD .
            ':val="' . $val . '" ' . CreateElement::NAMESPACEWORD .
            ':sz="' . $sz . '" ' . CreateElement::NAMESPACEWORD .
            ':space="' . $space . '" ' . CreateElement::NAMESPACEWORD .
            ':color="' . $color . '"></' . CreateElement::NAMESPACEWORD .
            ':insideH>__GENERATETBLBORDER__';
        $this->_xml = str_replace('__GENERATETBLBORDER__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblinsidev
     *
     * @param string $val
     * @param string $sz
     * @param string $space
     * @param string $color
     * @access protected
     */
    protected function generateTBLINSIDEV($val = "single", $sz= "4", $space='0',
                                          $color= 'auto')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':insideV ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '" ' .
            CreateElement::NAMESPACEWORD . ':sz="' . $sz . '" ' .
            CreateElement::NAMESPACEWORD . ':space="' . $space . '" ' .
            CreateElement::NAMESPACEWORD . ':color="' . $color . '"></' .
            CreateElement::NAMESPACEWORD . ':insideV>__GENERATETBLBORDER__';
        $this->_xml = str_replace('__GENERATETBLBORDER__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblleft
     *
     * @param string $val
     * @param string $sz
     * @param string $space
     * @param string $color
     * @access protected
     */
    protected function generateTBLLEFT($val = "single", $sz = "4", $space = '0',
                                       $color = 'auto')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':left ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '" ' .
            CreateElement::NAMESPACEWORD . ':sz="' . $sz . '" ' .
            CreateElement::NAMESPACEWORD . ':space="' . $space . '" ' .
            CreateElement::NAMESPACEWORD . ':color="' . $color . '"></' .
            CreateElement::NAMESPACEWORD . ':left>__GENERATETBLBORDER__';
        $this->_xml = str_replace('__GENERATETBLBORDER__', $xml, $this->_xml);
    }

    /**
     * Generate w:tbllook
     *
     * @param string $val
     * @access protected
     */
    protected function generateTBLLOOK($val = '000001E0')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':tblLook ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':tblLook>';
        $this->_xml = str_replace('__GENERATETBLLOOK__', $xml, $this->_xml);
    }

    /**
     * Generate w:tbloverlap
     *
     * @param string $val
     * @access protected
     */
    protected function generateTBLOVERLAP($val = 'never')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':tblOverlap ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':tblOverlap>';
        $this->_xml = str_replace('__GENERATETBLOVERLAP__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblpr
     *
     * @access protected
     */
    protected function generateTBLPR()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':tblPr>__GENERATETBLSTYLE____GENERA' .
            'TEJC____GENERATETBLW____GENERATETBLL' .
            'OOK____GENERATETBLOVERLAP____GENERATETBLCELL' .
            'SPACING____GENERATETBLBORDERS____GENERATESHD__</' .
            CreateElement::NAMESPACEWORD . ':tblPr>__GENERATETBL__';
        $this->_xml = str_replace('__GENERATETBL__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblright
     *
     * @param string $val
     * @param string $sz
     * @param string $space
     * @param string $color
     * @access protected
     */
    protected function generateTBLRIGHT($val = 'single', $sz = '4',
                                        $space = '0', $color = 'auto')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':right ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '" ' .
            CreateElement::NAMESPACEWORD . ':sz="' . $sz . '" ' .
            CreateElement::NAMESPACEWORD . ':space="' . $space . '" ' .
            CreateElement::NAMESPACEWORD . ':color="' . $color . '"></' .
            CreateElement::NAMESPACEWORD . ':right>__GENERATETBLBORDER__';
        $this->_xml = str_replace('__GENERATETBLBORDER__', $xml, $this->_xml);
    }

    /**
     * Generate w:tbltop
     *
     * @param string $val
     * @param string $sz
     * @param string $space
     * @param string $color
     * @access protected
     */
    protected function generateTBLTOP($val = 'single', $sz = '4', $space = '0',
                                      $color = 'auto')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':top ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '" ' .
            CreateElement::NAMESPACEWORD . ':sz="' . $sz . '" ' .
            CreateElement::NAMESPACEWORD . ':space="' . $space . '" ' .
            CreateElement::NAMESPACEWORD . ':color="' . $color . '"></' .
            CreateElement::NAMESPACEWORD . ':top>__GENERATETBLBORDER__';
        $this->_xml = str_replace('__GENERATETBLBORDER__', $xml, $this->_xml);
    }

    /**
     * Generate w:tblw
     *
     * @param string $type
     * @param string $w
     * @access protected
     */
    protected function generateTBLW($type = 'auto', $w = '0')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':tblW ' .
            CreateElement::NAMESPACEWORD . ':w="' . $w . '" ' .
            CreateElement::NAMESPACEWORD . ':type="' . $type . '"></' .
            CreateElement::NAMESPACEWORD . ':tblW>';
        $this->_xml = str_replace('__GENERATETBLW__', $xml, $this->_xml);
    }

    /**
     * Generate w:tc
     *
     * @access protected
     */
    protected function generateTC()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':tc >__GENERATETC__</' .
            CreateElement::NAMESPACEWORD . ':tc>__GENERATETR__';
        $this->_xml = str_replace('__GENERATETR__', $xml, $this->_xml);
    }

    /**
     * Generate w:tcpr
     *
     * @access protected
     */
    protected function generateTCPR()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':tcPr>__GENERATETCPR__</' . CreateElement::NAMESPACEWORD .
            ':tcPr>__GENERATETC__';
        $this->_xml = str_replace('__GENERATETC__', $xml, $this->_xml);
    }

    /**
     * Generate w:tcw
     *
     * @param string $w
     * @param string $type
     * @access protected
     */
    protected function generateTCW($w = '', $type = 'dxa')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':tcW ' .
            CreateElement::NAMESPACEWORD . ':w="' . $w . '" ' .
            CreateElement::NAMESPACEWORD . ':type="' . $type . '"></' .
            CreateElement::NAMESPACEWORD . ':tcW>__GENERATETCPR__';
        $this->_xml = str_replace('__GENERATETCPR__', $xml, $this->_xml);
    }

    /**
     * Generate w:tr
     *
     * @access protected
     */
    protected function generateTR()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':tr >__GENERATETRPR____GENERATETR__</' .
            CreateElement::NAMESPACEWORD . ':tr>__GENERATETBL__';
        $this->_xml = str_replace('__GENERATETBL__', $xml, $this->_xml);
    }

    /**
     * Generate w:trheight
     *
     * @param string $val
     * @access protected
     */
    protected function generateTRHEIGHT($val = '')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':trHeight ' .
            CreateElement::NAMESPACEWORD . ':val=" ' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':trHeight>';
        $this->_xml = str_replace('__GENERATETRPR__', $xml, $this->_xml);
    }

    /**
     * Generate w:trpr
     *
     * @access protected
     */
    protected function generateTRPR()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD .
            ':trPr>__GENERATETRPR__</' . CreateElement::NAMESPACEWORD .
            ':trPr>';
        $this->_xml = str_replace('__GENERATETRPR__', $xml, $this->_xml);
    }

    /**
     * Generate w:vmerge
     *
     * @param <type> $val
     * @deprecated
     * @access protected
     */
    protected function generateVMERGE($val = '')
    {

    }

    /**
     * Clean template r token
     *
     * @access private
     */
    private function cleanTemplateR()
    {
        $this->_xml = preg_replace('/__GENERATETR__/', '', $this->_xml);
    }
    
    /**
     * Clean template trpr token
     *
     * @access private
     */
    private function cleanTemplateTRPR()
    {
        $this->_xml = preg_replace('/__GENERATETRPR__/', '', $this->_xml);
    }

}