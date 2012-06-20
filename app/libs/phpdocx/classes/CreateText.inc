<?php

/**
 * Create text
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
 * Create text
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
class CreateText extends CreateElement
{
    const IDTITLE = 229998237;
    /**
     *
     * @access private
     * @var string
     */
    private static $_instance = NULL;
    /**
     *
     * @access private
     * @var int
     */
    private static $_idTitle = 0;

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
     * @return CreateText
     * @static
     */
    public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CreateText();
        }
        return self::$_instance;
    }

    /**
     * Create embedded text
     *
     * @access public
     * @param array $args[0]
     * @param array $args[1]
     */
    public function createEmbeddedText()
    {
        $this->_xml = '';
        $args = func_get_args();

        foreach ($args[0]->_embeddedText as $texts) {
            if (
                !empty($texts['jc']) ||
                !empty($texts['pageBreakBefore']) ||
                !empty($texts['widowControl']) ||
                !empty($args['wordWrap'])
            ) {
                $this->generatePPR();
                if (!empty($texts['jc']))
                    $this->generateJC($texts['jc']);
                if (!empty($texts['pageBreakBefore']))
                    $this->generatePAGEBREAKBEFORE(
                        $texts['pageBreakBefore']
                    );
                if (!empty($texts['widowControl']))
                    $this->generateWIDOWCONTROL($texts['widowControl']);
                if (!empty($texts['wordWrap']))
                    $this->generateWORDWRAP($texts['wordWrap']);
            }
            $this->generateR();
            if (
                $texts['b'] != '' ||
                $texts['i'] != '' ||
                $texts['u'] != '' ||
                $texts['sz'] != '' ||
                $texts['color'] != '' ||
                $texts['font'] != '' ||
                $args['tabs'] != ''
            ) {
                $this->generateRPR();
                if ($texts['font'] != '') {
                    $this->generateRFONTS($texts['font']);
                }
                if ($texts['b'] != '') {
                    $this->generateB($texts['b']);
                }
                if ($texts['i'] != '') {
                    $this->generateI($texts['i']);
                }
                if ($texts['u'] != '') {
                    $this->generateU($texts['u']);
                }
                if ($args['sz'] != '') {
                    $this->generateSZ($texts['sz']);
                }
                if ($args['color'] != '') {
                    $this->generateCOLOR($texts['color']);
                }
                if ($args['tabs'] != '') {
                    $this->generateTABS();
                }
            }
            $this->generateT($texts['text'], $args['spaces']);
            $this->cleanTemplateFirstRPR();
        }
    }

    /**
     * Create text
     *
     * @access public
     * @param mixed $args[0]
     * @param array $args[1]
     */
    public function createText()
    {
        $this->_xml = '';
        $args = func_get_args();

        $this->generateP();
        if (!is_array($args[0])) {
            if (
                !empty($args[1]['jc']) ||
                !empty($args[1]['pageBreakBefore']) ||
                !empty($args[1]['widowControl']) ||
                !empty($args[1]['wordWrap']) ||
                !empty($args[1]['lineSpacing'])
            ) {
                $this->generatePPR();
                if (!empty($args[1]['jc'])) {
                    $this->generateJC($args[1]['jc']);
                }
                if (!empty($args[1]['pageBreakBefore'])) {
                    $this->generatePAGEBREAKBEFORE($args[1]['pageBreakBefore']);
                }
                if (!empty($args[1]['widowControl'])) {
                    $this->generateWIDOWCONTROL($args[1]['widowControl']);
                }
                if (!empty($args[1]['wordWrap'])) {
                    $this->generateWORDWRAP($args[1]['wordWrap']);
                }
                if (!empty($args[1]['lineSpacing'])) {
                    $this->generateSPACING($args[1]['lineSpacing']);
                }
            }
            $this->generateR();
            if (
                (!empty($args[1]['b']) && $args[1]['b'] != '') ||
                (!empty($args[1]['i']) && $args[1]['i'] != '') ||
                (!empty($args[1]['u']) && $args[1]['u'] != '') ||
                (!empty($args[1]['sz']) && $args[1]['sz'] != '') ||
                (!empty($args[1]['color']) && $args[1]['color'] != '') ||
                (!empty($args[1]['font']) && $args[1]['font'] != '') ||
                (!empty($args[1]['tabs']) && $args[1]['tabs'] != '')
            ) {
                $this->generateRPR();
                if (isset($args[1]['font']) && $args[1]['font'] != '') {
                    $this->generateRFONTS($args[1]['font']);
                }
                if (isset($args[1]['b']) && $args[1]['b'] != '') {
                    $this->generateB($args[1]['b']);
                }
                if (isset($args[1]['i']) && $args[1]['i'] != '') {
                    $this->generateI($args[1]['i']);
                }
                if (isset($args[1]['u']) && $args[1]['u'] != '') {
                    $this->generateU($args[1]['u']);
                }
                if (isset($args[1]['sz']) && $args[1]['sz'] != '') {
                    $this->generateSZ($args[1]['sz']);
                }
                if (isset($args[1]['color']) && $args[1]['color'] != '') {
                    $this->generateCOLOR($args[1]['color']);
                }
                if (isset($args[1]['tabs']) && $args[1]['tabs'] != '') {
                    $this->generateTABS();
                }
            }
            if(!empty($args[1]['spaces'])) 
            {
            	$this->generateT($args[0], $args[1]['spaces']);
            }
            else 
            {
            	$this->generateT($args[0], null);
            }
            $this->cleanTemplateFirstRPR();
        } else {
            foreach ($args[0] as $texts) {
                if (
                    !empty($texts['jc']) ||
                    !empty($texts['pageBreakBefore']) ||
                    !empty($texts['widowControl']) ||
                    !empty($args['wordWrap'])
                ) {
                    $this->generatePPR();
                    if (!empty($texts['jc']))
                        $this->generateJC($texts['jc']);
                    if (!empty($texts['pageBreakBefore']))
                        $this->generatePAGEBREAKBEFORE(
                            $texts['pageBreakBefore']
                        );
                    if (!empty($texts['widowControl']))
                        $this->generateWIDOWCONTROL($texts['widowControl']);
                    if (!empty($texts['wordWrap']))
                        $this->generateWORDWRAP($texts['wordWrap']);
                }
                $this->generateR();

                if (
                    $texts['b'] != '' ||
                    $texts['i'] != '' ||
                    $texts['u'] != '' ||
                    $texts['sz'] != '' ||
                    $texts['color'] != '' ||
                    $texts['font'] != '' ||
                    $texts['tabs'] != ''
                ) {
                    $this->generateRPR();
                    if (isset($texts['font']) && $texts['font'] != '') {
                        $this->generateRFONTS($texts['font']);
                    }
                    if (isset($texts['b']) && $texts['b'] != '') {
                        $this->generateB($texts['b']);
                    }
                    if (isset($texts['i']) && $texts['i'] != '') {
                        $this->generateI($texts['i']);
                    }
                    if (isset($texts['u']) && $texts['u'] != '') {
                        $this->generateU($texts['u']);
                    }
                    if (isset($texts['sz']) && $texts['sz'] != '') {
                        $this->generateSZ($texts['sz']);
                    }
                    if (isset($texts['color']) && $texts['color'] != '') {
                        $this->generateCOLOR($texts['color']);
                    }
                    if (isset($texts['tabs']) && $texts['tabs'] != '') {
                        $this->generateTABS();
                    }
                }
                $this->generateT($texts['text'], $texts['spaces']);
                $this->cleanTemplateFirstRPR();
            }
        }
    }

    /**
     * Create title
     *
     * @access protected
     * @param string $arrArgs[0]
     * @param array $arrArgs[1]
     */
    public function createTitle()
    {
        $this->_xml = '';
        $args = func_get_args();
        if (!empty($args[1]['val']) && !empty($args[0])) {
            $this->generateP();
            $this->generatePPR();
            if (!empty($args[1]['type']) && $args[1]['type'] == 'subtitle')
                $this->generatePSTYLE('Subttulo' . $args[1]['val']);
            else
                $this->generatePSTYLE('Ttulo' . $args[1]['val']);
            if (!empty($args[1]['pageBreakBefore']))
                $this->generatePAGEBREAKBEFORE($args[1]['pageBreakBefore']);
            if (!empty($args[1]['widowControl']))
                $this->generateWIDOWCONTROL($args[1]['widowControl']);
            if (!empty($args[1]['wordWrap']))
                $this->generateWORDWRAP($args[1]['wordWrap']);
            self::$_idTitle++;
            $this->generateBOOKMARKSTART(
                self::$_idTitle, '_Toc' . (self::$_idTitle + self::IDTITLE)
            );
            $this->generateR();
            if (
                $args[1]['b'] != '' ||
                $args[1]['i'] != '' ||
                $args[1]['u'] != '' ||
                $args[1]['sz'] != '' ||
                $args[1]['color'] != '' ||
                $args[1]['font'] != ''
            ) {
                $this->generateRPR();
                if (!empty($args[1]['font']) && $args[1]['font'] != ''){
                    $this->generateRFONTS($args[1]['font']);
                }
                if (!empty($args[1]['b']) && $args[1]['b'] != '') {
                    $this->generateB($args[1]['b']);
                }
                if (!empty($args[1]['i']) && $args[1]['i'] != '') {
                    $this->generateI($args[1]['i']);
                }
                if (!empty($args[1]['u']) && $args[1]['u'] != '') {
                    $this->generateU($args[1]['u']);
                }
                if (!empty($args[1]['sz']) && $args[1]['sz'] != '') {
                    $this->generateSZ($args[1]['sz']);
                }
                if (!empty($args[1]['color']) && $args[1]['color'] != '') {
                    $this->generateCOLOR($args[1]['color']);
                }
            }
            $this->generateT($args[0]);
            $this->generateBOOKMARKEND(self::$_idTitle);
            $this->cleanTemplate();
        }
    }

    /**
     * Init text
     *
     * @access public
     * @param array $args[0]
     */
    public function initText()
    {
        $args = func_get_args();

        $this->_embeddedText = $args[0];
    }

    /**
     * Generate w:bookmarkend
     *
     * @access protected
     * @param int $id
     */
    protected function generateBOOKMARKEND($id)
    {
        $this->_xml = str_replace(
            '__GENERATEBOOKMARKEND__', '<' . CreateElement::NAMESPACEWORD .
            ':bookmarkEnd ' . CreateElement::NAMESPACEWORD . ':id="' . $id .
            '"></' . CreateElement::NAMESPACEWORD . ':bookmarkEnd>', $this->_xml
        );
    }

    /**
     * Generate w:bookmarkstart
     *
     * @access protected
     * @param int $id
     * @param string $name
     */
    protected function generateBOOKMARKSTART($id, $name)
    {
        $this->_xml = str_replace(
            '__GENERATER__', '<' . CreateElement::NAMESPACEWORD .
            ':bookmarkStart ' . CreateElement::NAMESPACEWORD . ':id="' . $id .
            '" ' . CreateElement::NAMESPACEWORD . ':name="' . $name . '"></' .
            CreateElement::NAMESPACEWORD .
            ':bookmarkStart>__GENERATER____GENERATEBOOKMARKEND__', $this->_xml
        );
    }

    /**
     * Generate w:color
     *
     * @access protected
     * @param string $val
     */
    protected function generateCOLOR($val = '000000')
    {
        $this->_xml = str_replace(
            '__GENERATERPR__', '<' . CreateElement::NAMESPACEWORD . ':color ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':color>__GENERATERPR__', $this->_xml
        );
    }

    /**
     * Generate w:i
     *
     * @access protected
     * @param string $val
     */
    protected function generateI($val = 'single')
    {
        $this->_xml = str_replace(
            '__GENERATERPR__', '<' . CreateElement::NAMESPACEWORD . ':i ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':i>__GENERATERPR__', $this->_xml
        );
    }

    /**
     * Generate w:jc
     *
     * @access protected
     * @param string $val
     */
    protected function generateJC($val = '')
    {
        $this->_xml = str_replace(
            '__GENERATEPPR__', '<' . CreateElement::NAMESPACEWORD . ':jc ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':jc>__GENERATESZ__', $this->_xml
        );
    }

    /**
     * Generate w:pagebreakbefore
     *
     * @access protected
     * @param string $val
     */
    protected function generatePAGEBREAKBEFORE($val = 'on')
    {
        $this->_xml = str_replace(
            '__GENERATEPPR__', '<' . CreateElement::NAMESPACEWORD .
            ':pageBreakBefore val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':pageBreakBefore>__GENERATEPPR__',
            $this->_xml
        );
    }

    /**
     * Generate w:ppr
     *
     * @access protected
     */
    protected function generatePPR()
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':pPr>__GENERATEPPR__</' . CreateElement::NAMESPACEWORD .
               ':pPr>__GENERATER__';

        $this->_xml = str_replace('__GENERATEP__', $xml, $this->_xml);
    }

    /**
     * Generate w:pstyle
     *
     * @access protected
     * @param string $val
     */
    protected function generatePSTYLE($val = 'Ttulo')
    {
        $this->_xml = str_replace(
            '__GENERATEPPR__', '<' . CreateElement::NAMESPACEWORD . ':pStyle ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':pStyle>__GENERATEPPR__',
            $this->_xml
        );
    }

    /**
     * Generate w:spacing
     *
     * @access protected
     */
    protected function generateSPACING($line = '240')
    {
        $xml = '<' . CreateElement::NAMESPACEWORD . ':spacing ' . CreateElement::NAMESPACEWORD . ':line="' . $line  .
               '" ' . CreateElement::NAMESPACEWORD . ':lineRule="auto"/>__GENERATEPPR__';

        $this->_xml = str_replace('__GENERATEPPR__', $xml, $this->_xml);
    }

    /**
     * Generate w:sz
     *
     * @access protected
     * @param string $val
     */
    protected function generateSZ($val = '11')
    {
        $val *= 2;
        $this->_xml = str_replace(
            '__GENERATERPR__', '<' . CreateElement::NAMESPACEWORD . ':sz ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':sz>__GENERATERPR__', $this->_xml
        );
    }

    /**
     * Generate w:t
     *
     * @access protected
     * @param string $dat
     * @param int $spaces
     */
    protected function generateT($dat, $spaces = 0)
    {
        $strSpaces = '';
        if ($spaces) {
            $i = 0;
            while ($i < $spaces) {
                $strSpaces .= ' ';
                $i++;
            }
        }
        $this->_xml = str_replace(
            '__GENERATER__', '<' . CreateElement::NAMESPACEWORD .
            ':t xml:space="preserve">' . $strSpaces . $dat . '</' .
            CreateElement::NAMESPACEWORD . ':t>', $this->_xml
        );
    }

    /**
     * Generate w:abs
     *
     * @access protected
     */
    protected function generateTABS()
    {
        $this->_xml = str_replace(
            '__GENERATER__', '<' . CreateElement::NAMESPACEWORD .
             ':tab/>__GENERATER__', $this->_xml
        );
    }

    /**
     * Generate w:u
     *
     * @access protected
     * @param string $val
     */
    protected function generateU($val = 'single')
    {
        $this->_xml = str_replace(
            '__GENERATERPR__', '<' . CreateElement::NAMESPACEWORD . ':u ' .
            CreateElement::NAMESPACEWORD . ':val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':u>__GENERATERPR__', $this->_xml
        );
    }

    /**
     * Generate w:widowcontrol
     *
     * @access protected
     * @param string $val
     */
    protected function generateWIDOWCONTROL($val = 'on')
    {
        $this->_xml = str_replace(
            '__GENERATEPPR__', '<' . CreateElement::NAMESPACEWORD .
            ':widowControl val="' . $val . '"></' .
            CreateElement::NAMESPACEWORD . ':widowControl>__GENERATEPPR__',
            $this->_xml
        );
    }

    /**
     * Generate w:wordwrap
     *
     * @access protected
     * @param string $val
     */
    protected function generateWORDWRAP($val = 'on')
    {
        $this->_xml = str_replace(
            '__GENERATEPPR__', '<' . CreateElement::NAMESPACEWORD .
            ':wordWrap val="' . $val . '"></' . CreateElement::NAMESPACEWORD .
            ':wordWrap>__GENERATEPPR__', $this->_xml
        );
    }

}
