<?php

/**
 * Use DOCX as templates
 *
 * @category   Phpdocx
 * @package    elements
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    05.26.2011
 * @link       http://www.phpdocx.com
 * @since      File available since Release 1.7
 */

/**
 * Use DOCX as templates
 *
 * @category   Phpdocx
 * @package    elements
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    05.26.2011
 * @link       http://www.phpdocx.com
 * @since      Class available since Release 1.7
 */
class CreateTemplate
{

    /**
     * @access public
     * @var array
     * @static
     */
    public static $embedFiles = array();
    /**
     * @access public
     * @var string
     * @static
     */
    public static $path;
    /**
     * @access public
     * @var array
     * @static
     */
    public static $placeholderImages = array();
    /**
     * @access public
     * @var int
     * @static
     */
    public static $ridInitTemplateCharts;
    /**
     * @access public
     * @var int
     * @static
     */
    public static $totalTemplateCharts;
    /**
     * @access private
     * @var string
     * @static
     */
    private static $_chartsRelsChartXMLRels;
    /**
     * @access private
     * @var string
     * @static
     */
    private static $_contentTypes;
    /**
     * @access private
     * @var string
     * @static
     */
    private static $_document;
    /**
     * @access private
     * @var array
     * @static
     */
    //@RamirezZ
    private static $_footer = array();
    /**
     * @access private
     * @var array
     * @static
     */
    //@RamirezZ
    private static $_header = array();
    /**
     * @access private
     * @var int
     */
    private $_idDOCX = 1;
    /**
     * @access private
     * @var int
     */
    private $_idHTML = 1;
    /**
     * @access private
     * @var int
     */
    private $_idRTF = 1;
    /**
     * @access private
     * @var CreateTemplate
     * @static
     */
    private static $_instance = NULL;
    /**
     * @access private
     * @var boolean
     */
    private $_isDOCX = false;
    /**
     * @access private
     * @var boolean
     */
    private $_isHTML = false;
    /**
     * @access private
     * @var boolean
     */
    private $_isRTF = false;
    /**
     * @access private
     * @var string
     * @static
     */
    private static $_relsDocumentXMLRels;
    /**
     * @access private
     * @var bool
     * @static
     */
    private static $_template;
    /**
     * @access private
     * @var string
     * @static
     */
    private static $_templateSymbol = '$';

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
     * @return CreateTemplate
     * @static
     */
    public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CreateTemplate();
        }
        return self::$_instance;
    }

    /**
     * Check if DOCX is a template
     *
     * @access public
     * @return boolean
     * @static
     */
    public static function getBlnTemplate()
    {
        return self::$_template;
    }

    /**
     * Return current document word
     *
     * @access public
     * @return string
     * @static
     */
    public static function getDocument()
    {
        return self::$_document;
    }

    /**
     * Return current document header
     *
     * @access public
     * @return string
     * @static
     */
    //@Ramirezz
    public static function getHeader($i = 1)
    {
    	if(!empty(self::$_header[$i]))
    	{
        return self::$_header[$i];
    	}
    	else 
    	{
    		return null;
    	}
    }

    /**
     * Return current document footer
     *
     * @access public
     * @return string
     * @static
     */
    //@Ramirezz
    public static function getFooter($i = 1)
    {
    	if(!empty(self::$_footer[$i]))
    	{
        return self::$_footer[$i];
    	}
    	else 
    	{
    		return null;
    	}
    }

    /**
     * Getter. Return template symbol
     *
     * @access public
     * @return string
     * @static
     */
    public static function getTemplateSymbol()
    {
        return self::$_templateSymbol;
    }

    /**
     * Setter. Set template symbol
     *
     * @access public
     * @param string $templateSymbol
     * @static
     */
    public static function setTemplateSymbol($templateSymbol)
    {
        self::$_templateSymbol = $templateSymbol;
    }

    /**
     * Return current rels document xml rels
     *
     * @access public
     * @return string
     * @static
     */
    public static function getRelsDocumentXMLRels()
    {
        return self::$_relsDocumentXMLRels;
    }

    /**
     * Return current content types
     *
     * @access public
     * @return string
     * @static
     */
    public static function getContentTypes()
    {
        return self::$_contentTypes;
    }

    /**
     * Add content types
     *
     * @access public
     * @param string $args[0]
     * @static
     */
    public static function addContentTypes()
    {
        $args = func_get_args();

        if (strstr(self::$_contentTypes, 'Default Extension="xlsx"') &&
            $args[0] == '<Default Extension="xlsx" ContentType="application' .
                        '/octet-stream"> </Default>'
        ) {
            return;
        }
        $domContentTypes = new DomDocument();
        $domContentTypes->loadXML(self::$_contentTypes);
        $xmlTypes = $domContentTypes->getElementsByTagName('Types');
        $xmlNewContentType = $domContentTypes->createDocumentFragment();
        $xmlNewContentType->appendXML($args[0]);
        $xmlTypes->item(0)->appendChild($xmlNewContentType);

        self::$_contentTypes = $domContentTypes->saveXML();
    }

    /**
     * Add relationship
     *
     * @access public
     * @param string $args[0]
     * @static
     */
    public static function addRelationship()
    {
        $args = func_get_args();

        $domRelsDocumentXMLRels = new DomDocument();
        $domRelsDocumentXMLRels->loadXML(self::$_relsDocumentXMLRels);
        $xmlTypes = $domRelsDocumentXMLRels->getElementsByTagName(
            'Relationships'
        );
        $xmlNewRelationship = $domRelsDocumentXMLRels->createDocumentFragment();
        $xmlNewRelationship->appendXML($args[0]);
        $xmlTypes->item(0)->appendChild($xmlNewRelationship);

        self::$_relsDocumentXMLRels = $domRelsDocumentXMLRels->saveXML();
    }

    /**
     * clear all the placeholders which start with 'BLOCK_'
     *
     * @access public
     */
    public function deleteAllBlocks()
    {
        // Sometimes Word splits tags. Find and replace all of them with
        // new string surrounded by template symbol value
        $documentSymbol = explode(self::$_templateSymbol, self::$_document);
        foreach ($documentSymbol as $documentSymbolValue) {
            if (strpos(strip_tags($documentSymbolValue), 'BLOCK_') !== false) {
                self::$_document = str_replace($documentSymbolValue, strip_tags($documentSymbolValue), self::$_document);
            }
        }
        $domDocument = new DomDocument();
        $domDocument->loadXML(self::$_document);

        $xmlWP = $domDocument->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main',
                                                      'p');
        $xpath = new DOMXPath($domDocument);
        $length = $xmlWP->length;
        $itemsWP = array();
        for ($i = 0; $i < $length; $i++) {
            $itemsWP[$i] = $xmlWP->item($i);
        }
        $query = 'w:r/w:t';
        for ($i = 0; $i < $length; $i++) {
            $variables = $xpath->query($query, $itemsWP[$i]);
            foreach ($variables as $entry) {
                $deleteCurrent = false;
                if (
                    strpos($entry->nodeValue,
                           self::$_templateSymbol . 'BLOCK_'
                    ) !== false
                ) {
                    //when we find a placeholder, we delete it
                    $deleteCurrent = true;
                    break;
                }
            }
            if ($deleteCurrent) {
                $padre = $itemsWP[$i]->parentNode;
                $padre->removeChild($itemsWP[$i]);
                self::$_document = $domDocument->saveXML();
            }
        }
    }

    /**
     * Clear a specific placeholder which starts with 'BLOCK_'
     *
     * @access public
     * @param string $blockName Block name
     */
    public function deleteBlock($blockName)
    {
        self::parseBlock('BLOCK_' . $blockName);
        $ini = strpos(self::$_document, self::$_templateSymbol . 'BLOCK_' . $blockName . self::$_templateSymbol);
        if ($ini !== false) {
            $end = strpos(substr(self::$_document,
                                 $ini + strlen(self::$_templateSymbol . 'BLOCK_' . $blockName . self::$_templateSymbol)),
                          self::$_templateSymbol . 'BLOCK_' . $blockName . self::$_templateSymbol);
            if ($end !== false) {
                self::$_document = substr(self::$_document, 0,
                                          $ini + strlen(self::$_templateSymbol . 'BLOCK_' . $blockName .
                                                        self::$_templateSymbol)) .
                                   substr(self::$_document, $ini + (strlen(self::$_templateSymbol . 'BLOCK_' . $blockName .
                                                                           self::$_templateSymbol) * 2) + $end);
            }
        }
    }

    /**
     * Merge the content, the footer and the header from two files
     *
     * @access public
     * @param  $path1 File path
     * @param  $path2 File path
     */
    public function mergeFiles($path1, $path2)
    {
        //use the first file as template
        self::openTemplate($path1);
        $_newFile = tempnam(sys_get_temp_dir(), 'merge_phpdocx');
        copy($path2, $_newFile);
        if (file_exists($_newFile)) {
            $docx = new ZipArchive();
            $docx->open($_newFile);
            // read document.xml file and extract the wordxml content
            $fullContent = $docx->getFromName('word/document.xml');
            $fullContent = self::cleanDocument($fullContent);

            $startedRemovedUnwantedContent = explode('<w:body>', $fullContent);
            $endedRemovedUnwantedContent = explode('</w:body', $startedRemovedUnwantedContent[1]);
            $newDocumentXml = $endedRemovedUnwantedContent[0];
            //extract files from the zip
            $relsWord = $docx->getFromName('word/_rels/document.xml.rels');
            $_contentType = $docx->getFromName('[Content_Types].xml');
            $footers = self::extractHeaderFooter($fullContent, $relsWord, 'footer');
            $headers = self::extractHeaderFooter($fullContent, $relsWord, 'header');
            if (count($footers) > 0) {
                foreach ($footers as $ind => $val) {
                    if ($docx->statName('word/' . $ind)) {
                        $footers[$ind]['xml'] = $docx->getFromName('word/' . $ind);
                    }
                }
            }
            if (count($headers) > 0) {
                foreach ($headers as $ind => $val) {
                    if ($docx->statName('word/' . $ind)) {
                        $headers[$ind]['xml'] = $docx->getFromName('word/' . $ind);
                    }
                }
            }
            $aToReplace = array();
            $aToBeReplace = array();
            $i = 1;
            //get the new name for the footers and headers files and the new rId, and set the content_type and
            //the relationship in the template
            foreach ($footers as $ind => $val) {
                //add footers to the template
                while (isset(self::$_footer['footer' . $i . '.xml'])) {
                    $i++;
                }
                self::$_footer['footer' . $i . '.xml'] = $val['xml'];
                self::addContentTypes('<Override PartName="/word/footer' . $i .
                                      '.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.footer+xml"/>');
                self::addRelationship('<Relationship Id="rId' . CreateDocx::$intIdWord .
                                      '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/footer" Target="footer' .
                                      $i . '.xml"/>');
                $aToReplace[] = 'rId' . CreateDocx::$intIdWord++;
                $aToBeReplace[] = $val['rid'];
            }
            $i = 1;
            foreach ($headers as $ind => $val) {
                //add headers to the template
                while (isset(self::$_header['header' . $i . '.xml'])) {
                    $i++;
                }
                    self::$_header['header' . $i . '.xml'] = $val['xml'];
                
                
                self::addContentTypes('<Override PartName="/word/header' . $i .
                                      '.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.header+xml"/>');
                self::addRelationship('<Relationship Id="rId' . CreateDocx::$intIdWord .
                                      '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/header" Target="header' . $i . '.xml"/>');
                
                $aToReplace[] = 'rId' . CreateDocx::$intIdWord++;
                $aToBeReplace[] = $val['rid'];
                
            }
            self::$_document = self::prepareSections(self::$_document);
            self::$_document = str_replace('</w:body',
                                           str_replace($aToBeReplace, $aToReplace, $newDocumentXml) . '</w:body',
                                           self::$_document);
        }
    }

    /**
     * Open current template
     *
     * @access public
     * @param string $args[0]
     * @static
     */
    public function openTemplate()
    {
        $args = func_get_args();

        $this->objTemplate = new ZipArchive();

        self::$path = $args[0];
        self::$_template = 1;
        $this->objTemplate->open(self::$path);

        self::$_document = $this->objTemplate->getFromName('word/document.xml');

        if ($this->objTemplate->statName('word/_rels/document.xml.rels')) {
            self::$_relsDocumentXMLRels = $this->objTemplate->getFromName(
                'word/_rels/document.xml.rels'
            );

            $this->getCurrentRID();
        }

        if ($this->objTemplate->statName('word/charts/_rels/chart1.xml.rels')) {
            self::$_chartsRelsChartXMLRels = $this->objTemplate->getFromName(
                'word/charts/_rels/chart1.xml.rels'
            );
        }

        if ($this->objTemplate->statName('[Content_Types].xml')) {
            self::$_contentTypes = $this->objTemplate->getFromName(
                '[Content_Types].xml'
            );
        }
        //@Ramirezz
       	$i=1;
        while($this->objTemplate->statName('word/footer'.$i.'.xml')){
        	self::$_footer[$i] = $this->objTemplate->getFromName('word/footer'.$i.'.xml');
        	$i++;          
        }
        //@Ramirezz
       	$i=1;
        while($this->objTemplate->statName('word/header'.$i.'.xml')){
        	self::$_header[$i] = $this->objTemplate->getFromName('word/header'.$i.'.xml');
        	$i++;          
        }
        
        if ($this->objTemplate->statName('word/charts/_rels/chart1.xml.rels')) {
            self::$_chartsRelsChartXMLRels = $this->objTemplate->getFromName(
                'word/charts/_rels/chart1.xml.rels'
            );
        }
    }

    /**
     * Prepare the placeholder. Clear the wordXML code between the characters of the placeholder.
     *
     * @access public
     * @param string $blockName Block name
     */
    public function parseBlock($blockName)
    {
        // Sometimes Word splits tags. Find and replace all of them with
        $documentSymbol = explode(self::$_templateSymbol, self::$_document);
        foreach ($documentSymbol as $documentSymbolValue) {
            if (strip_tags($documentSymbolValue) == $blockName) {
                self::$_document = str_replace($documentSymbolValue, $blockName, self::$_document);
            }
        }
    }

    /**
     * Replace chart in template
     *
     * @access public
     * @param string $args[0]
     * @static
     */
    public static function replaceChart()
    {
        $args = func_get_args();

        $domDocument = new DomDocument();
        $domDocument->loadXML(self::$_document);

        $xmlWP = $domDocument->getElementsByTagNameNS(
            'http://schemas.openxmlformats.org/wordprocessingml/2006/main',
            'p'
        );
        $xpath = new DOMXPath($domDocument);
        $query = 'w:r/w:t';
        for ($i = 0; $i < $xmlWP->length; $i++) {
            $xmlGraphics = $xpath->query($query, $xmlWP->item($i));
            foreach ($xmlGraphics as $entry) {
                if (
                    self::$_templateSymbol . $args[0] .
                    self::$_templateSymbol ==
                    $entry->nodeValue
                ) {
                    $domChart = $entry->parentNode->parentNode;
                    $xmlR = $domChart->getElementsByTagNameNS(
                        'http://schemas.openxmlformats.org/wordprocessingml/' .
                        '2006/main',
                        'r'
                    )->item(0);

                    $domChart->removeChild($xmlR);
                    $domVarChart = $domDocument->createElement(
                        'varchart_' . CreateDocx::$intIdWord
                    );
                    $domChart->appendChild($domVarChart);
                }
            }
        }
        self::$_document = $domDocument->saveXML();
        self::$totalTemplateCharts++;
    }

    /**
     * Replace a placeholder with a checkbox
     *
     * @access public
     * @param string checkName Checkbox variable name
     * @param string $value Value
     */
    public function replaceCheckbox($checkName, $value)
    {
        self::parseBlock('CHECK_' . $checkName);
        $domDocument = new DomDocument();
        $domDocument->loadXML(self::$_document);

        $xmlWP = $domDocument->getElementsByTagNameNS(
            'http://schemas.openxmlformats.org/wordprocessingml/2006/main',
            'p'
        );
        $xpath = new DOMXPath($domDocument);
        $length = $xmlWP->length;
        $itemsWP = array();
        for ($i = 0; $i < $length; $i++) {
            $itemsWP[$i] = $xmlWP->item($i);
        }
        $query = 'w:r/w:t';
        for ($i = 0; $i < $length; $i++) {
            $variables = $xpath->query($query, $itemsWP[$i]);
            foreach ($variables as $entry) {
                if (
                    strpos($entry->nodeValue, self::$_templateSymbol . 'CHECK_' . $checkName . self::$_templateSymbol)
                    !== false
                ) {
                    $entry->setAttribute('xml:space', 'preserve');
                    $padre = $entry->parentNode->parentNode;
                    $newNode = $domDocument->createElement('w:r', '');
                    $newNode2 = $domDocument->createElement('w:sym', '');
                    $newNode2->setAttribute('w:font', 'Wingdings');
                    if ($value)
                        $newNode2->setAttribute('w:char', 'F0FE');
                    else
                        $newNode2->setAttribute('w:char', 'F06F');
                    $newNode->appendChild($newNode2);
                    $padre->insertBefore($newNode, $entry->parentNode);

                    break;
                }
            }
        }
        self::$_document = str_replace(self::$_templateSymbol . 'CHECK_' . $checkName . self::$_templateSymbol,
                                       '', $domDocument->saveXML());
    }

    /**
     * Replace image in template
     *
     * @access public
     * @param string $args[0]
     * @param string $args[1]
     * @static
     */
    public function replaceImage()
    {
        $args = func_get_args();

        $domDocument = new DomDocument();
        $domDocument->loadXML(self::$_document);

        $domImages = $domDocument->getElementsByTagNameNS('http://schemas.openxmlformats.org/drawingml/2006/' .
                                                          'wordprocessingDrawing', 'docPr');
        $domImagesId = $domDocument->getElementsByTagNameNS(
            'http://schemas.openxmlformats.org/drawingml/2006/main',
            'blip'
        );

        for ($i = 0; $i < $domImages->length; $i++) {
            if ($domImages->item($i)->getAttribute('descr') ==
                self::$_templateSymbol . $args[0] . self::$_templateSymbol) {
                $ind = $domImagesId->item($i)->getAttribute('r:embed');
                self::$placeholderImages[$ind] = $args[1];
            }
        }
    }

    /**
     * Replace images in template
     *
     * @access public
     * @param ZipArchive $docxTemplate
     * @static
     */
    public static function replaceImages(&$docxTemplate)
    {
        $domRelsDocumentXMLRels = new DomDocument();
        $domRelsDocumentXMLRels->loadXML(self::$_relsDocumentXMLRels);

        $domRelationships = $domRelsDocumentXMLRels->getElementsByTagName(
            'Relationship'
        );

        foreach ($domRelationships as $domRelationship) {
            $id = $domRelationship->getAttribute('Id');
            if (self::$placeholderImages[$id]) {
                $docxTemplate->addFile(
                    self::$placeholderImages[$id],
                    'word/' . $domRelationship->getAttribute('Target')
                );
            }
        }
    }

    /**
     * Replace variables in template.
     * Allows text strings and array of values as variables.
     *
     * @access public
     * @param mixed $args[0]. Array or string
     * @param mixed $args[1]
     * @param array $args[2]. Optional. Settings template
     * @static
     */
    public function replaceVariable()
    {
        $args = func_get_args();
        $cloneDom = '';
        $domParent = '';

        if (is_string($args[0])) {
            // Sometimes Word splits tags. Find and replace all of them with
            // new string surrounded by template symbol value
            $documentSymbol =
                    explode(self::$_templateSymbol, self::$_document);
            foreach ($documentSymbol as $documentSymbolValue) {
                if (strip_tags($documentSymbolValue) == $args[0]) {
                    self::$_document = str_replace(
                        $documentSymbolValue, $args[0], self::$_document
                    );
                }
            }
        }

        // Replace VAR within DOCX.
        if ($args[2] == 'docx' && is_string($args[0]) && is_string($args[1])) {
            if (!$this->_isDOCX) {
                $this->addContentTypes('<Default Extension="zip" ContentType="application/vnd.openxmlformats'
                                       . '-officedocument.wordprocessingml.document.main+xml"> </Default>');
                $this->_isDOCX = true;
            }
            $this->addRelationship('<Relationship Id="rDOCXId' . $this->_idDOCX .
                                   '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/' .
                                   'aFChunk" Target="docx' . $this->_idDOCX .
                                   '.zip" TargetMode="Internal"></Relationship>');
            // add source and dest filepath
            self::$embedFiles[] = array(
                'src_file' => $args[1],
                'dest_file' => 'docx' . $this->_idDOCX . '.zip'
            );
            $args[1] = '<' . CreateElement::NAMESPACEWORD . ':altChunk r:id="rDOCXId' . $this->_idDOCX . '" ' .
                       'xmlns:r="http://schemas.openxmlformats.org/' . 'officeDocument/2006/relationships" ' .
                       'xmlns:w="http://schemas.openxmlformats.org/' . 'wordprocessingml/2006/main" />';
            $this->_idDOCX++;
        }

        // Replace VAR within HTML.
        if ($args[2] == 'html' && is_string($args[0]) && is_string($args[1])) {
            if (!$this->_isHTML) {
                $this->addContentTypes('<Default Extension="htm" ContentType="application/xhtml+xml"> </Default>');
                $this->_isHTML = true;
            }
            $this->addRelationship('<Relationship Id="rHTMLId' . $this->_idHTML .
                                   '" Type="http://schemas.openxmlformats.org/officeDocument/2006/' .
                                   'relationships/aFChunk" Target="html' . $this->_idHTML .
                                   '.htm" TargetMode="Internal"></Relationship>');
            // add source string and dest filepath
            self::$embedFiles[] = array(
                'src_string' => '<html>' . $args[1] . '</html>',
                'dest_file' => 'html' . $this->_idDOCX . '.htm'
            );
            $args[1] = '<' . CreateElement::NAMESPACEWORD . ':altChunk r:id="rHTMLId' . $this->_idHTML . '" ' .
                       'xmlns:r="http://schemas.openxmlformats.org/' . 'officeDocument/2006/relationships" ' .
                       'xmlns:w="http://schemas.openxmlformats.org/' . 'wordprocessingml/2006/main" />';
            $this->_idHTML++;
        }

        // Replace VAR within RTF.
        if ($args[2] == 'rtf' && is_string($args[0]) && is_string($args[1])) {
            if (!$this->_isRTF) {
                $this->addContentTypes('<Default Extension="rtf" ContentType="application/rtf"> </Default>');
                $this->_isRTF = true;
            }
            $this->addRelationship('<Relationship Id="rRTFId' . $this->_idRTF .
                                   '" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/' .
                                   'aFChunk" Target="rtf' . $this->_idRTF . '.rtf" TargetMode="Internal">' .
                                   '</Relationship>');
            // add source and dest filepath
            self::$embedFiles[] = array(
                'src_file' => $args[1],
                'dest_file' => 'rtf' . $this->_idDOCX . '.rtf'
            );
            $args[1] = '<' . CreateElement::NAMESPACEWORD .
                       ':altChunk r:id="rRTFId' . $this->_idRTF . '" ' .
                       'xmlns:r="http://schemas.openxmlformats.org/' .
                       'officeDocument/2006/relationships" ' .
                       'xmlns:w="http://schemas.openxmlformats.org/' .
                       'wordprocessingml/2006/main" />';
            $this->_idRTF++;
        }

        // Only lists and tables are supported.
        if (($args[1] == 'list' || $args[1] == 'table') && is_array($args[0])) {
            $domDocument = new DomDocument();
            $domDocument->loadXML(self::$_document);

            $xmlWP = $domDocument->getElementsByTagNameNS(
                'http://schemas.openxmlformats.org/wordprocessingml/2006/main',
                'p'
            );
            $xpath = new DOMXPath($domDocument);
            $query = 'w:r/w:t';
            $length = $xmlWP->length;
            $itemsWP = array();
            for ($i = 0; $i < $length; $i++) {
                $itemsWP[$i] = $xmlWP->item($i);
            }
            for ($i = 0; $i < $length; $i++) {
                $variables = $xpath->query($query, $itemsWP[$i]);
                foreach ($variables as $entry) {
                    if (isset($args[2]['header'])) {
                        foreach ($args[0] as $valuesArray) {
                            foreach ($valuesArray as $keys => $values) {
                                if (empty($entry->nodeValue)) {
                                    continue;
                                }
                                if (
                                    strpos(
                                        $entry->nodeValue,
                                        self::$_templateSymbol . $keys .
                                        self::$_templateSymbol
                                    ) !== false
                                ) {
                                    if ($args[1] == 'list') {
                                        $domP = $entry->parentNode->parentNode;
                                        $domParent = $entry->parentNode->
                                        parentNode->parentNode;
                                        $cloneDom = $entry->
                                        parentNode->parentNode->cloneNode(true);
                                        try {
                                            $domP->parentNode->insertBefore(
                                                $cloneDom, $domP
                                            );
                                        }
                                        catch (Exception $e) {
                                            CreateDocx::$log->fatal(
                                                $e->getMessage()
                                            );
                                            exit();
                                        }
                                    } elseif ($args[1] == 'table') {
                                        $domTR = $entry->parentNode->
                                        parentNode->parentNode->
                                        parentNode;
                                        if (
                                            $entry->parentNode->
                                            parentNode->parentNode->
                                            parentNode->nodeName == 'w:tr'
                                        ) {
                                            $domParent = $entry->parentNode->
                                            parentNode->parentNode->
                                            parentNode->parentNode;
                                            $cloneDom = $entry->parentNode->
                                            parentNode->parentNode->
                                            parentNode->cloneNode(true);
                                            try {
                                                $domTR->parentNode->insertBefore(
                                                    $cloneDom, $domTR
                                                );
                                            }
                                            catch (Exception $e) {
                                                CreateDocx::$log->fatal(
                                                    $e->getMessage()
                                                );
                                                exit();
                                            }
                                        }
                                    }
                                }
                                /* Only the first key is needed to iterate over
                                 * DOM and clone the required nodes.
                                 */
                                break;
                            }
                        }
                    } else {
                        if ($args[1] == 'list') {
                            $domP = $entry->parentNode->parentNode;
                            $domParent = $entry->parentNode->
                            parentNode->parentNode;
                            $cloneDom = $entry->
                            parentNode->parentNode->cloneNode(true);
                            try {
                                $domP->parentNode->insertBefore(
                                    $cloneDom, $domP
                                );
                            }
                            catch (Exception $e) {
                                CreateDocx::$log->fatal(
                                    $e->getMessage()
                                );
                                exit();
                            }
                        } elseif ($args[1] == 'table') {
                            $domTR = $entry->parentNode->
                            parentNode->parentNode->
                            parentNode;
                            if (
                                $entry->parentNode->
                                parentNode->parentNode->
                                parentNode->nodeName == 'w:tr'
                            ) {
                                $domParent = $entry->parentNode->
                                parentNode->parentNode->
                                parentNode->parentNode;
                                $cloneDom = $entry->parentNode->
                                parentNode->parentNode->
                                parentNode->cloneNode(true);
                                try {
                                    $domTR->parentNode->insertBefore(
                                        $cloneDom, $domTR
                                    );
                                }
                                catch (Exception $e) {
                                    CreateDocx::$log->fatal(
                                        $e->getMessage()
                                    );
                                    exit();
                                }
                            }
                        }
                        /* Only the first key is needed to iterate over
                         * DOM and clone the required nodes.
                         */
                        break;
                    }
                }
            }
            /* A last element is created due to number of values plus the first
             *  used as placeholder. Just remove it.
             */
            if (is_object($domParent)) {
                $domParent->removeChild($cloneDom);
            }
            self::$_document = $domDocument->saveXML();
        }

        // Iterate text array.
        if (is_string($args[0]) && is_array($args[1])) {
            $domDocument = new DomDocument();
            $domDocument->loadXML(self::$_document);

            $xmlWP = $domDocument->getElementsByTagNameNS(
                'http://schemas.openxmlformats.org/wordprocessingml/2006/main',
                'p'
            );
            $xpath = new DOMXPath($domDocument);
            $query = 'w:r/w:t';
            $length = $xmlWP->length;
            $itemsWP = array();
            for ($i = 0; $i < $length; $i++) {
                $itemsWP[$i] = $xmlWP->item($i);
            }
            for ($i = 0; $i < $length; $i++) {
                $variables = $xpath->query($query, $itemsWP[$i]);
                foreach ($variables as $entry) {
                    foreach ($args[1] as $values) {
                        if (
                                self::$_templateSymbol . $args[0] .
                                self::$_templateSymbol ==
                                $entry->nodeValue
                            && $entry->nodeValue != '$'
                        ) {
                            $domP = $entry->parentNode->parentNode;
                            $domParent = $entry->parentNode->
                            parentNode->parentNode;
                            $cloneDom = $entry->
                            parentNode->parentNode->cloneNode(true);
                            try {
                                $domP->parentNode->insertBefore(
                                    $cloneDom, $domP
                                );
                            }
                            catch (Exception $e) {
                                CreateDocx::$log->fatal(
                                    $e->getMessage()
                                );
                                exit();
                            }
                        }
                    }
                }
            }
            /* A last element is created due to number of values plus the first
             *  used as placeholder. Just remove it.
             */
            if (is_object($domParent)) {
                $domParent->removeChild($cloneDom);
            }
            self::$_document = $domDocument->saveXML();
        }

        if (is_string($args[0])) {
            // Text string or array of texts
            if (is_string($args[1])) {
                // Single text string
                self::$_document = str_replace(
                    self::$_templateSymbol . $args[0]
                    . self::$_templateSymbol,
                    $args[1],
                    self::$_document
                );

                //@Ramirezz
                 $i=1;
                while(!empty(self::$_footer [$i] )) 
                {          
                	self::$_footer [$i] = str_replace(self::$_templateSymbol . $args[0] . self::$_templateSymbol, $args[1],
                                             self::$_footer [$i]);
                  $i++;
                }
                            
                //@Ramirezz
                 $i=1;
                while(!empty(self::$_header[$i] )) 
                {          
                	self::$_header[$i] = str_replace(self::$_templateSymbol . $args[0] . self::$_templateSymbol, $args[1],
                                             self::$_header[$i]);
                  $i++;
                }
            } elseif (is_array($args[1])) {
                // Text array
                foreach ($args[1] as $values) {
                    self::$_document = preg_replace(
                        '/\\' . self::$_templateSymbol . $args[0]
                        . '\\' . self::$_templateSymbol . '/',
                        $values,
                        self::$_document,
                        1
                    );

                    $i=1;
                    //@Ramirezz
		                while(!empty(self::$_footer[$i] )) 
		                { 
                    	self::$_footer[$i] = preg_replace('/\\' . self::$_templateSymbol . $args[0] . '\\' .
                                                  self::$_templateSymbol . '/', $values, self::$_footer[$i], 1);
                      $i++;
		                }
		                
                    $i=1;
                    //@Ramirezz
		                while(!empty(self::$_header[$i] )) 
		                { 
                    	self::$_header[$i] = preg_replace('/\\' . self::$_templateSymbol . $args[0] . '\\' .
                                                  self::$_templateSymbol . '/', $values, self::$_header[$i], 1);
                      $i++;
		                }
                }
            }
        } elseif (is_array($args[0])) {
            // List or table
            foreach ($args[0] as $values) {
                foreach ($values as $keys => $textValue) {
                    $documentSymbol =
                            explode(self::$_templateSymbol, self::$_document);
                    foreach ($documentSymbol as $documentSymbolValue) {
                        if (strip_tags($documentSymbolValue) == $keys) {
                            self::$_document = str_replace(
                                $documentSymbolValue, $keys, self::$_document
                            );
                        }
                    }
                    self::$_document = preg_replace(
                        '/\\' . self::$_templateSymbol . $keys . '\\' .
                        self::$_templateSymbol . '/',
                        $textValue,
                        self::$_document,
                        1
                    );
                    self::$_footer = preg_replace('/\\' . self::$_templateSymbol . $keys . '\\' .
                                                  self::$_templateSymbol . '/', $textValue, self::$_footer, 1);
                    //@Ramirezz                              
                    $i=1;
                    while(!empty(self::$_footer[$i] )) 
		                { 
                    	self::$_footer[$i] = preg_replace('/\\' . self::$_templateSymbol . $keys . '\\' .
                                                  self::$_templateSymbol . '/', $textValue, self::$_footer[$i], 1);
		                	$i++;
		                }
                    //@Ramirezz                              
                    $i=1;
                    while(!empty(self::$_header[$i] )) 
		                { 
                    	self::$_header[$i] = preg_replace('/\\' . self::$_templateSymbol . $keys . '\\' .
                                                  self::$_templateSymbol . '/', $textValue, self::$_header[$i], 1);
		                	$i++;
		                }
                }
            }
        }
    }

    /**
     * Replace variable char in template
     *
     * @access public
     * @param string $args[0]
     * @static
     */
    public static function replaceVariableChart($chart, $i)
    {
        $chart = str_replace('<w:p>', '', $chart);
        $chart = str_replace('</w:p>', '', $chart);
        self::$_document = str_replace(
            '<varchart_' . $i . '/>',
            $chart,
            self::$_document
        );
    }

    /**
     * Return template variables
     *
     * @access public
     * @return array
     */
    public function returnVariables()
    {
        $variables = array();

        $documentSymbol = explode(self::$_templateSymbol, self::$_document);
        $i = 0;
        foreach ($documentSymbol as $documentSymbolValue) {
            // avoid first and last values, and tag elements
            if ($i == 0 || $i == count($documentSymbol)
                || $documentSymbolValue[0] == '<') {
                $i++;
                continue;
            } else {
                $variables['document'][] = strip_tags($documentSymbolValue);
                $i++;
            }
        }
        //@Ramirezz
				$i=1;
				
				while (!empty(self::$_header[$i]))
				{
	        $documentSymbol = explode(self::$_templateSymbol, self::$_header[$i]);
	        $i = 0;
	        foreach ($documentSymbol as $documentSymbolValue) {
	            // avoid first and last values, and tag elements
	            if ($i == 0 || $i == count($documentSymbol)
	                || $documentSymbolValue[0] == '<') {
	                $i++;
	                continue;
	            } else {
	                $variables['header'][] = strip_tags($documentSymbolValue);
	                $i++;
	                
	            }
	        }
				}
        $documentSymbol = explode(self::$_templateSymbol, self::$_footer);
        $i = 0;
        foreach ($documentSymbol as $documentSymbolValue) {
            // avoid first and last values, and tag elements
            if ($i == 0 || $i == count($documentSymbol)
                || $documentSymbolValue[0] == '<') {
                $i++;
                continue;
            } else {
                $variables['footer'][] = strip_tags($documentSymbolValue);
                $i++;
            }
        }

        return $variables;
    }

    /**
     * Get current rid
     *
     * @access private
     */
    private function getCurrentRID()
    {
        $rId = 0;
        $domRelsDocumentXMLRels = new DomDocument();
        $domRelsDocumentXMLRels->loadXML(self::$_relsDocumentXMLRels);

        $xmlRelationship = $domRelsDocumentXMLRels->getElementsByTagName(
            'Relationship'
        );

        for ($i = 0; $i < $xmlRelationship->length; $i++) {
            if (
                (int)substr(
                    $xmlRelationship->item($i)->getAttribute('Id'), 3
                ) > $rId
            ) {
                $rId = (int)substr(
                    $xmlRelationship->item($i)->getAttribute('Id'), 3
                );
            }
        }

        CreateDocx::$intIdWord = $rId + 1;
        self::$ridInitTemplateCharts = $rId + 1;
    }

}
