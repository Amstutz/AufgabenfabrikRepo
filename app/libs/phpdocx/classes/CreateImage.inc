<?php

/**
 * Create images
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
 * Create images
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
class CreateImage extends CreateElement
{
    const NAMESPACEWORD = 'wp';
    const NAMESPACEWORD1 = 'a';
    const NAMESPACEWORD2 = 'pic';
    const CONSTWORD = 360000;
    const TAMBORDER = 12700;

    /**
     * @access private
     * @var CreateImage
     * @static
     */
    private static $_instance = NULL;
    /**
     *
     * @access private
     * @var string
     */
    private $_name;
    /**
     *
     * @access private
     * @var int
     */
    private $_rId;
    /**
     *
     * @access private
     * @var string
     */
    private $_ajusteTexto;
    /**
     *
     * @access private
     * @var int
     */
    private $_sizeX;
    /**
     *
     * @access private
     * @var int
     */
    private $_sizeY;
    /**
     *
     * @access private
     * @var int
     */
    private $_spacingTop;
    /**
     *
     * @access private
     * @var int
     */
    private $_spacingBottom;
    /**
     *
     * @access private
     * @var int
     */
    private $_spacingLeft;
    /**
     *
     * @access private
     * @var int
     */
    private $_spacingRight;
    /**
     *
     * @access private
     * @var int
     */
    private $_jc;
    /**
     *
     * @access private
     * @var string
     */
    private $_border;
    /**
     *
     * @access private
     * @var string
     */
    private $_borderDiscontinuo;
    /**
     *
     * @access private
     * @var int
     */
    private $_scaling;

    /**
     * Construct
     *
     * @access public
     */
    public function __construct()
    {
        $this->_name = '';
        $this->_rId = '';
        $this->_ajusteTexto = '';
        $this->_sizeX = '';
        $this->_sizeY = '';
        $this->_spacingTop = '';
        $this->_spacingBottom = '';
        $this->_spacingLeft = '';
        $this->_spacingRight = '';
        $this->_jc = '';
        $this->_border = '';
        $this->_borderDiscontinuo = '';
        $this->_scaling = '';
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
     * @return string
     * @access public
     */
    public function __toString()
    {
        return $this->_xml;
    }

    /**
     *
     * @return CreateImage
     * @access public
     * @static
     */
    public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CreateImage();
        }
        return self::$_instance;
    }

    /**
     * Setter. Name
     *
     * @access public
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * Getter. Name
     *
     * @access public
     * @return <type>
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Setter. Rid
     *
     * @access public
     * @param string $rId
     */
    public function setRId($rId)
    {
        $this->_rId = $rId;
    }

    /**
     * Getter. Rid
     *
     * @access public
     * @return <type>
     */
    public function getRId()
    {
        return $this->_rId;
    }

    /**
     * Create image
     *
     * @access public
     * @param array $args[0]
     */
    public function createImage()
    {
        $this->_xml = '';
        $this->_name = '';
        $this->_rId = '';
        $args = func_get_args();
        if (!empty($args[0]['rId']) && (!empty($args[0]['name']))) {
            $atributos = getimagesize($args[0]['name']);

            if (!isset($args[0]['textWrap']) || $args[0]['textWrap'] < 0 ||
                $args[0]['textWrap'] > 5
            ) {
                $ajusteTexto = 0;
            } else {
                $ajusteTexto = $args[0]['textWrap'];
            }

            if (!empty($args[0]['sizeX'])) {
                $tamPxX = $args[0]['sizeX'];
            } elseif (!empty($args[0]['scaling'])) {
                $tamPxX = $atributos[0] * $args[0]['scaling'] / 100;
            } else {
                $tamPxX = $atributos[0];
            }

            if (!empty($args[0]['scaling'])) {
                $tamPxY = $atributos[1] * $args[0]['scaling'] / 100;
            } elseif (!empty($args[0]['sizeY'])) {
                $tamPxY = $args[0]['sizeY'];
            } else {
                $tamPxY = $atributos[1];
            }

            $this->setName($args[0]['name']);
            $this->setRId($args[0]['rId']);
            $top = '0';
            $bottom = '0';
            $left = '0';
            $right = '0';

            switch ($atributos['mime']) {
                case 'image/png':
                    list($dpiX, $dpiY) =
                        $this->getDpiPng($args[0]['name']);
                    $tamWordX =
                        round($tamPxX * 100 / $dpiX * CreateImage::CONSTWORD);
                    $tamWordY =
                        round($tamPxY * 100 / $dpiY * CreateImage::CONSTWORD);

                    if (isset($args[0]['spacingTop'])) {
                        $top = round(
                            $args[0]['spacingTop'] * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingBottom'])) {
                        $bottom = round(
                            $args[0]['spacingBottom'] * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingLeft'])) {
                        $left = round(
                            $args[0]['spacingLeft'] * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingRight'])) {
                        $right = round(
                            $args[0]['spacingRight'] * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    break;
                case 'image/jpg':
                case 'image/jpeg':
                    list($dpiX, $dpiY) = $this->getDpiJpg($args[0]['name']);
                    $tamWordX = round(
                        $tamPxX * 2.54 /
                        $dpiX * CreateImage::CONSTWORD
                    );
                    $tamWordY = round(
                        $tamPxY * 2.54 /
                        $dpiY * CreateImage::CONSTWORD
                    );
                    if (isset($args[0]['spacingTop'])) {
                        $top = round(
                            $args[0]['spacingTop'] * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingBottom'])) {
                        $bottom = round(
                            $args[0]['spacingBottom'] * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingLeft'])) {
                        $left = round(
                            $args[0]['spacingLeft'] * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingRight'])) {
                        $right = round(
                            $args[0]['spacingRight'] * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    break;
                case 'image/gif':
                    $tamWordX = round(
                        $tamPxX * 2.54 /
                        96 * CreateImage::CONSTWORD
                    );
                    $tamWordY = round(
                        $tamPxY * 2.54 /
                        96 * CreateImage::CONSTWORD
                    );
                    if (isset($args[0]['spacingTop'])) {
                        $top = round(
                            $args[0]['spacingTop'] * 2.54 /
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingBottom'])) {
                        $bottom = round(
                            $args[0]['spacingBottom'] * 2.54 /
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingLeft'])) {
                        $left = round(
                            $args[0]['spacingLeft'] * 2.54 /
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    if (isset($args[0]['spacingRight'])) {
                        $right = round(
                            $args[0]['spacingRight'] * 2.54 /
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    break;
            }
            $align = '';
            if (!empty($args[0]['jc']) && $args[0]['jc'] == 'center') {
                $tamPageX = 15 * CreateImage::CONSTWORD;
                $align = round(($tamPageX - $tamWordX) / 2);
            } elseif (!empty($args[0]['jc']) && $args[0]['jc'] == 'right') {
                $tamPageX = 15 * CreateImage::CONSTWORD;
                $align = round($tamPageX - $tamWordX);
            }

            $this->generateP();
            if (!empty($args[0]['jc'])) {
                $this->generatePPR();
                $this->generateJC($args[0]['jc']);
            }
            $this->generateR();
            $this->generateRPR();
            $this->generateNOPROOF();
            $this->generateDRAWING();
            if ($ajusteTexto == 0) {
                $this->generateINLINE();
            } else {
                if ($ajusteTexto == 3) {
                    $this->generateANCHOR(1);
                } else {
                    $this->generateANCHOR();
                }
                $this->generateSIMPLEPOS();
                $this->generatePOSITIONH();
                if ($align != '') {
                    $this->generatePOSOFFSET($align);
                } else {
                    $this->generatePOSOFFSET(15240);
                }
                $this->generatePOSITIONV();
                $this->generatePOSOFFSET("0");
            }

            $this->generateEXTENT($tamWordX, $tamWordY);
            $this->generateEFFECTEXTENT($left, $top, $right, $bottom);

            switch ($ajusteTexto) {
                case 1:
                    $this->generateWRAPSQUARE();
                    break;
                case 2:
                case 3:
                    $this->generateWRAPNONE();
                    break;
                case 4:
                    $this->generateWRAPTOPANDBOTTOM();
                    break;
                case 5:
                    $this->generateWRAPTHROUGH();
                    $this->generateWRAPPOLYGON();
                    $this->generateSTART();
                    $this->generateLINETO();
                    $this->generateLINETO('21540', '21342');
                    $this->generateLINETO('21540', '0');
                    $this->generateLINETO('-198', '0');
                    break;
                default:
                    break;
            }
            $this->generateDOCPR();
            $this->generateCNVGRAPHICFRAMEPR();
            $this->generateGRAPHICPRAMELOCKS(1);
            $this->generateGRAPHIC();
            $this->generateGRAPHICDATA();
            $this->generatePIC();
            $this->generateNVPICPR();
            $this->generateCNVPR();
            $this->generateCNVPICPR();
            $this->generateBLIPFILL();
            $this->generateBLIP();
            $this->generateSTRETCH();
            $this->generateFILLRECT();
            $this->generateSPPR();
            $this->generateXFRM();
            $this->generateOFF();
            $this->generateEXT($tamWordX, $tamWordY);
            $this->generatePRSTGEOM();
            $this->generateAVLST();
            if (!empty($args[0]['border']) && is_numeric($args[0]['border'])) {
                $this->generateLN($args[0]['border'] * CreateImage::TAMBORDER);
                $this->generateSOLIDFILL();
                $this->generateSCHEMECLR();
                if (isset($args[0]['borderDiscontinuous']) && 
                    $args[0]['borderDiscontinuous'] == 1) {
                    $this->generatePRSTDASH();
                }
            }

            $this->cleanTemplate();
        } else {
            echo 'There was an error adding the image';
        }
    }

    /**
     * Create embedded image
     *
     * @access public
     * @param string $comeFrom
     */
    public function createEmbeddedImage($comeFrom)
    {
        $this->_xml = '';
        if ($this->getRId() != '' && $this->getName() != '') {
            $attrImage = getimagesize($this->getName());

            if ($this->_ajusteTexto != '' && ($this->_ajusteTexto < 0 || 
                $this->_ajusteTexto > 5)) {
                $textalign = 0;
            } else {
                $textalign = $this->_ajusteTexto;
            }

            if ($this->_sizeX != '') {
                $tamPxX = $this->_sizeX;
            } elseif ($this->_scaling != '') {
                $tamPxX = $this->_scaling * $attrImage[0]/100;
            } else {
                $tamPxX = $attrImage[0];
            }

            if ($this->_sizeY != '') {
                $tamPxY = $this->_sizeY;
            } elseif ($this->_scaling != '') {
                $tamPxY = $this->_scaling * $attrImage[1] / 100;
            } else {
                $tamPxY = $attrImage[1];
            }
            $top = '0';
            $bottom = '0';
            $left = '0';
            $right = '0';

            switch ($attrImage['mime']) {
                case 'image/png':
                    list($dpiX, $dpiY) = $this->getDpiPng($this->getName());
                    $tamWordX = round(
                        $tamPxX * 100 / $dpiX * CreateImage::CONSTWORD
                    );
                    $tamWordY = round(
                        $tamPxY * 100 / $dpiY * CreateImage::CONSTWORD
                    );
                    if ($this->_spacingTop != '') 
                        $top = round(
                            $this->_spacingTop * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    if ($this->_spacingBottom != '') 
                        $bottom = round(
                            $this->_spacingBottom * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    if ($this->_spacingLeft != '') 
                        $left = round(
                            $this->_spacingLeft * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    if ($this->_spacingRight != '') 
                        $right = round(
                            $this->_spacingRight * 100 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    break;
                case 'image/jpg':
                case 'image/jpeg':
                    list($dpiX, $dpiY) = $this->getDpiJpg($this->getName());
                    $tamWordX = round(
                        $tamPxX * 2.54 / $dpiX * CreateImage::CONSTWORD
                    );
                    $tamWordY = round(
                        $tamPxY * 2.54 / $dpiY * CreateImage::CONSTWORD
                    );
                    if ($this->_spacingTop != '') {
                        $top = round(
                            $this->_spacingTop * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if ($this->_spacingBottom) {
                        $bottom = round(
                            $this->_spacingBottom * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if ($this->_spacingLeft != '') {
                        $left = round(
                            $this->_spacingLeft * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    if ($this->_spacingRight != '') {
                        $right = round(
                            $this->_spacingRight * 2.54 /
                            $dpiX * CreateImage::CONSTWORD
                        );
                    }
                    break;
                case 'image/gif':
                    $tamWordX = round(
                        $tamPxX * 2.54 / 96 * CreateImage::CONSTWORD
                    );
                    $tamWordY = round(
                        $tamPxY * 2.54 / 96 * CreateImage::CONSTWORD
                    );
                    if ($this->_spacingTop != '') {
                        $top = round(
                            $this->_spacingTop * 2.54/
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    if ($this->_spacingBottom != '') {
                        $bottom = round(
                            $this->_spacingBottom * 2.54 /
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    if ($this->_spacingLeft != '') {
                        $left = round(
                            $this->_spacingLeft * 2.54 /
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    if ($this->_spacingRight != '') {
                        $right = round(
                            $this->_spacingRight * 2.54 /
                            96 * CreateImage::CONSTWORD
                        );
                    }
                    break;
            }
            $align = '';
            if ($this->_jc != '' && $this->_jc == 'center') {
                $tamPageX = 15 * CreateImage::CONSTWORD;
                $align = round(($tamPageX - $tamWordX) / 2);
            } elseif ($this->_jc != '' && $this->_jc == 'right') {
                $tamPageX = 15 * CreateImage::CONSTWORD;
                $align = round($tamPageX - $tamWordX);
            }

            if ($comeFrom != 'table') {
                $this->generateR();
            } else {
                $this->generateQUITAR();
            }
            $this->generateRPR();
            $this->generateNOPROOF();
            $this->generateDRAWING();
            if ($textalign == 0) {
                $this->generateINLINE();
            } else {
                if ($textalign == 3) {
                    $this->generateANCHOR(1);
                } else {
                    $this->generateANCHOR();
                }
                $this->generateSIMPLEPOS();
                $this->generatePOSITIONH();
                if ($align != '') {
                    $this->generatePOSOFFSET($align);
                } else {
                    $this->generatePOSOFFSET(15240);
                }
                $this->generatePOSITIONV();
                $this->generatePOSOFFSET("0");
            }

            $this->generateEXTENT($tamWordX, $tamWordY);
            $this->generateEFFECTEXTENT($left, $top, $right, $bottom);

            switch ($textalign) {
                case 1:
                    $this->generateWRAPSQUARE();
                    break;
                case 2:
                case 3:
                    $this->generateWRAPNONE();
                    break;
                case 4:
                    $this->generateWRAPTOPANDBOTTOM();
                    break;
                case 5:
                    $this->generateWRAPTHROUGH();
                    $this->generateWRAPPOLYGON();
                    $this->generateSTART();
                    $this->generateLINETO();
                    $this->generateLINETO('21540', '21342');
                    $this->generateLINETO('21540', '0');
                    $this->generateLINETO('-198', '0');
                    break;
                default:
                    break;
            }
            $this->generateDOCPR();
            $this->generateCNVGRAPHICFRAMEPR();
            $this->generateGRAPHICPRAMELOCKS(1);
            $this->generateGRAPHIC();
            $this->generateGRAPHICDATA();
            $this->generatePIC();
            $this->generateNVPICPR();
            $this->generateCNVPR();
            $this->generateCNVPICPR();
            $this->generateBLIPFILL();
            $this->generateBLIP();
            $this->generateSTRETCH();
            $this->generateFILLRECT();
            $this->generateSPPR();
            $this->generateXFRM();
            $this->generateOFF();
            $this->generateEXT($tamWordX, $tamWordY);
            $this->generatePRSTGEOM();
            $this->generateAVLST();
            if ($this->_border != '' && is_numeric($this->_border)) {
                $this->generateLN($this->_border * CreateImage::TAMBORDER);
                $this->generateSOLIDFILL();
                $this->generateSCHEMECLR();
                if ($this->_borderDiscontinuo != '' && 
                    $this->_borderDiscontinuo == 1) {
                    $this->generatePRSTDASH();
                }
            }
            $this->cleanTemplate();
        } else {
            echo 'There was an error adding the image';
        }
    }

    /**
     * Init image
     *
     * @access public
     * @param array $args[0]
     */
    public function initImage()
    {
        $args = func_get_args();
        $this->_name = $args[0]['name'];
        $this->_ajusteTexto = $args[0]['textWrap'];
        $this->_sizeX = $args[0]['sizeX'];
        $this->_sizeY = $args[0]['sizeY'];
        $this->_spacingTop = $args[0]['spacingTop'];
        $this->_spacingBottom = $args[0]['spacingBottom'];
        $this->_spacingLeft = $args[0]['spacingLeft'];
        $this->_spacingRight = $args[0]['spacingRight'];
        $this->_jc = $args[0]['jc'];
        $this->_border = $args[0]['border'];
        $this->_borderDiscontinuo = $args[0]['borderDiscontinuous'];
        $this->_scaling = $args[0]['scaling'];
    }

    /**
     * Get image jpg dpi
     *
     * @access private
     * @param string $filename
     * @return array
     */
    private function getDpiJpg($filename)
    {
        $a = fopen($filename, 'r');
        $string = fread($a, 20);
        fclose($a);
        $data = bin2hex(substr($string, 14, 4));
        $x = substr($data, 0, 4);
        $y = substr($data, 4, 4);
        return array(hexdec($x), hexdec($y));
    }

    /**
     * Get image png dpi
     *
     * @access private
     * @param string $filename
     * @return array
     */
    private function getDpiPng($filename)
    {
        $a = fopen($filename, 'r');
        $string = fread($a, 1000);
        $aux = strpos($string, 'pHYs');
        $data = bin2hex(substr($string, $aux + strlen('pHYs'), 16));
        fclose($a);
        $x = substr($data, 0, 8);
        $y = substr($data, 8, 8);
        return array(hexdec($x), hexdec($y));
    }

}
