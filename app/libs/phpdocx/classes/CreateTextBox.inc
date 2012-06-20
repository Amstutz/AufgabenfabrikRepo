<?php

/**
 * Create text box
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
 * Create text box
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
class CreateTextBox extends CreateElement
{
    const NAMESPACEWORD = 'v';
    /**
     *
     * @access private
     * @var string
     */
    private $_align;
    /**
     *
     * @access private
     * @var string
     */
    private $_b;
    /**
     *
     * @access private
     * @var string
     */
    private $_color;
    /**
     *
     * @access private
     * @var string
     */
    private $_fillColor;
    /**
     *
     * @access private
     * @var string
     */
    private $_font;
    /**
     *
     * @access private
     * @var string
     */
    private $_height;
    /**
     *
     * @access private
     * @var string
     */
    private $_i;
    /**
     *
     * @access private
     * @static
     * @var CreateTextBox
     */
    private static $_instance = NULL;
    /**
     *
     * @access private
     * @var string
     */
    private $_jc;
    /**
     *
     * @access private
     * @var string
     */
    private $_marginBottom;
    /**
     *
     * @access private
     * @var string
     */
    private $_marginLeft;
    /**
     *
     * @access private
     * @var string
     */
    private $_marginRight;
    /**
     *
     * @access private
     * @var string
     */
    private $_marginTop;
    /**
     *
     * @access private
     * @var string
     */
    private $_pageBreakBefore;
    /**
     *
     * @access private
     * @var string
     */
    private $_sz;
    /**
     *
     * @access private
     * @var string
     */
    private $_text;
    /**
     *
     * @access private
     * @var string
     */
    private $_textJc;
    /**
     *
     * @access private
     * @var string
     */
    private $_u;
    /**
     *
     * @access private
     * @var string
     */
    private $_widowControl;
    /**
     *
     * @access private
     * @var string
     */
    private $_width;
    /**
     *
     * @access private
     * @var string
     */
    private $_wordWrap;

    /**
     * Construct
     *
     * @access public
     */
    public function __construct()
    {
        $this->_text = '';
        $this->_marginTop = '';
        $this->_marginBottom = '';
        $this->_marginRight = '';
        $this->_marginLeft = '';
        $this->_width = '';
        $this->_height = '';
        $this->_align = '';
        $this->_fillColor = '';
        $this->_jc = '';
        $this->_textJc = '';
        $this->_b = '';
        $this->_color = '';
        $this->_i = '';
        $this->_sz = '';
        $this->_u = '';
        $this->_pageBreakBefore = '';
        $this->_widowControl = '';
        $this->_wordWrap = '';
        $this->_font = '';
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
     * Magic method, returns current XML
     *
     * @access public
     * @return string Return current XML
     */
    public function __toString()
    {
        return $this->_xml;
    }

    /**
     * Singleton, return instance of class
     *
     * @access public
     * @return CreateTextBox
     * @static
     */
    public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CreateTextBox();
        }
        return self::$_instance;
    }

    /**
     * Create embedded textbox
     *
     * @access public
     */
    public function createEmbeddedTextBox()
    {
        $this->_xml = '';
        $this->generateQUITAR();
        $this->generateRPR();
        $this->generateNOPROOF();
        $this->generatePICT();
        $this->generateSHAPETYPE();
        $this->generateSTROKE();
        $this->generatePATH();
        $this->generateSHAPE(
            array(
                'margin_top' => $this->_marginTop,
                'margin_bottom' => $this->_marginBottom,
                'margin_right' => $this->_marginRight,
                'margin_left' => $this->_marginLeft,
                'width' => $this->_width,
                'height' => $this->_height,
                'align' => $this->_align,
                'fillcolor' => $this->_fillColor,
                'jc' => $this->_jc
            )
        );
        $this->generateTEXTBOX();
        $this->generateTXBXCONTENT();
        $this->addText(
            $this->_text,
            array(
                'jc' => $this->_textJc,
                'b' => $this->_b,
                'color' => $this->_color,
                'i' => $this->_i,
                'sz' => $this->_sz,
                'u' => $this->_u,
                'pageBreakBefore' => $this->_pageBreakBefore,
                'widowControl' => $this->_widowControl,
                'wordWrap' => $this->_wordWrap,
                'font' => $this->_font
            )
        );
        $this->generateWRAP($style);
        $this->cleanTemplate();
    }
    /**
     * Create textbox
     *
     * @access public
     * @param array $dat
     * @param array $style
     */
    public function createTextBox($dat, $style = '')
    {
        $this->_xml = '';
        $this->generateP();
        $this->generateR();
        $this->generateRPR();
        $this->generateNOPROOF();
        $this->generatePICT();
        $this->generateSHAPETYPE();
        $this->generateSTROKE();
        $this->generatePATH();
        $this->generateSHAPE($style);
        $this->generateTEXTBOX();
        $this->generateTXBXCONTENT();
        $this->addText($dat['text'], $dat['args']);
        $this->generateWRAP($style);
        $this->cleanTemplate();
    }

    /**
     * Init text box
     *
     * @access public
     * @param array $args[0]
     */
    public function initTextBox()
    {
        $args = func_get_args();
        $this->_text = $args[0][0]['text'];
        $this->_marginTop = $args[0][1]['margin_top'];
        $this->_marginBottom = $args[0][1]['margin_bottom'];
        $this->_marginRight = $args[0][1]['margin_right'];
        $this->_marginLeft = $args[0][1]['margin_left'];
        $this->_width = $args[0][1]['width'];
        $this->_height = $args[0][1]['height'];
        $this->_align = $args[0][1]['align'];
        $this->_fillColor = $args[0][1]['fillcolor'];
        $this->_jc = $args[0][1]['jc'];
        $this->_textJc = $args[0][0]['args']['jc'];
        $this->_b = $args[0][0]['args']['b'];
        $this->_color = $args[0][0]['args']['color'];
        $this->_i = $args[0][0]['args']['i'];
        $this->_sz = $args[0][0]['args']['sz'];
        $this->_u = $args[0][0]['args']['u'];
        $this->_pageBreakBefore = $args[0][0]['args']['pageBreakBefore'];
        $this->_widowControl = $args[0][0]['args']['widowControl'];
        $this->_wordWrap = $args[0][0]['args']['wordWrap'];
        $this->_font = $args[0][0]['args']['font'];
    }

    /**
     * Create text in textbox
     *
     * @access protected
     * @param mixed $dat
     * @param array $style
     */
    protected function addText($dat, $style = '')
    {
        $objText = CreateText::getInstance();
        $objText->createText($dat, $style);
        $this->_xml = str_replace(
            '__GENERATETXBXCONTENT__', (string) $objText, $this->_xml
        );
    }
    
    /**
     * Generate w:shapetype
     *
     * @access protected
     * @param string $id
     * @param string $coordsize
     * @param string $spt
     * @param string $path
     * @param string $id
     */
    protected function generateSHAPETYPE(
        $id = '_x0000_t202', $coordsize = '21600,21600',
        $spt = '202', $path = 'm,l,21600r21600,l21600,xe'
    )
    {
        $this->_xml = str_replace(
            '__GENERATEPICT__', '<' . CreateTextBox::NAMESPACEWORD .
            ':shapetype id="' . $id . '" coordsize="' . $coordsize .
            '" o:spt="' . $spt . '" path="' . $path .
            '">__GENERATESHAPETYPE__</' . CreateTextBox::NAMESPACEWORD .
            ':shapetype>__GENERATEPICT__', $this->_xml
        );
    }

    /**
     * Generate w:stroke
     *
     * @access protected
     * @param string $joinstyle
     */
    protected function generateSTROKE($joinstyle = 'miter')
    {
        $this->_xml = str_replace(
            '__GENERATESHAPETYPE__', '<' . CreateTextBox::NAMESPACEWORD .
            ':stroke joinstyle="' . $joinstyle . '"></' .
            CreateTextBox::NAMESPACEWORD . ':stroke>__GENERATESHAPETYPE__',
            $this->_xml
        );
    }

    /**
     * Generate w:path
     *
     * @access protected
     * @param string $gradientshapeok
     * @param string $connecttype
     */
    protected function generatePATH(
        $gradientshapeok = 't', $connecttype = 'rect'
    )
    {
        $this->_xml = str_replace(
            '__GENERATESHAPETYPE__', '<' . CreateTextBox::NAMESPACEWORD .
            ':path gradientshapeok="' . $gradientshapeok . '" o:connecttype="' .
            $connecttype . '"></' . CreateTextBox::NAMESPACEWORD . ':path>',
            $this->_xml
        );
    }

    /**
     * Generate w:shape
     *
     * @access protected
     * @param array $args[0]
     */
    protected function generateSHAPE()
    {
        $args = func_get_args();
        $id = '_x0000_s1026';
        $type = '#_x0000_t202';
        $style = 'z-index:251660288;';
        if (!empty($args[0]['align']))
            $style .= 'mso-position-horizontal:' . $args[0]['align'] . ';';
        if (!empty($args[0]['margin_top']))
            $style .= 'margin-top:' . $args[0]['margin_top'] . ';';
        else
            $style .= 'margin-top:0;';
        if (!empty($args[0]['margin_left']))
            $style .= 'margin-left:' . $args[0]['margin_left'] . ';';
        else
            $style .= 'margin-left:0;';
        if (!empty($args[0]['margin_right']))
            $style .= 'margin-right:' . $args[0]['margin_right'] . ';';
        if (!empty($args[0]['margin_right']))
            $style .= 'margin-right:' . $args[0]['margin_right'] . ';';
        if (!empty($args[0]['width']))
            $style .= 'mso-width-percent:' . $args[0]['width'] . ';';
        else
            $style .= 'mso-width-percent:400;';
        if (!empty($args[0]['height']))
            $style .= 'mso-height-percent:' . $args[0]['height'] . ';';
        else
            $style .= 'mso-height-percent:400;';
        $strAux = '';
        if (!empty($args[0]['jc'])) {
            $style .= 'position:absolute;';
            $strAux = ' wrapcoords="-33 -170 -33 21430 21633 21430 21633 ' .
                '-170 -33 -170"';
        }
        $style = substr($style, 0, -1);
        $xmlAux = '<' . CreateTextBox::NAMESPACEWORD . ':shape id="' . $id .
            '" type="' . $type . '" style="' . $style . '"' . $strAux;



        if (!empty($args[0]['fillcolor'])) {
            $xmlAux .= ' fillcolor="' . $args[0]['fillcolor'] . '"';
        }
        $xmlAux .= '>__GENERATESHAPE__</' . CreateTextBox::NAMESPACEWORD .
            ':shape>';
        $this->_xml = str_replace('__GENERATEPICT__', $xmlAux, $this->_xml);
    }

    /**
     * Generate w:textbox
     *
     * @access protected
     * @param string $style
     */
    protected function generateTEXTBOX($style = 'mso-fit-shape-to-text:t')
    {
        $this->_xml = str_replace(
            '__GENERATESHAPE__', '<' . CreateTextBox::NAMESPACEWORD .
            ':textbox style="' . $style . '">__GENERATETEXTBOX__</' .
            CreateTextBox::NAMESPACEWORD . ':textbox>__GENERATESHAPE__',
            $this->_xml
        );
    }

    /**
     * Generate w:txbxcontent
     *
     * @access protected
     */
    protected function generateTXBXCONTENT()
    {
        $this->_xml = str_replace(
            '__GENERATETEXTBOX__', '<' . CreateElement::NAMESPACEWORD .
            ':txbxContent>__GENERATETXBXCONTENT__</' .
            CreateElement::NAMESPACEWORD . ':txbxContent>', $this->_xml
        );
    }

    /**
     * Generate w:wrap
     *
     * @access protected
     * @param array $args[0]
     */
    protected function generateWRAP()
    {
        $type = 'through';
        $args = func_get_args();
        if ($args[0]['jc']) {
            $type = $args[0]['jc'];
            $this->_xml = str_replace(
                '__GENERATESHAPE__', '<' . CreateElement::NAMESPACEWORD .
                '10:wrap type="' . $type . '"></' .
                CreateElement::NAMESPACEWORD . '10:wrap>__GENERATESHAPE__',
                $this->_xml
            );
        }
    }

}
