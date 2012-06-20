<?php

/**
 * Parse DOCX file
 *
 * @category   Phpdocx
 * @package    parser
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.3
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.3
 */

/**
 * Parse DOCX file
 *
 * @category   Phpdocx
 * @package    parser
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.3
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.3
 */
class Parser
{

    /**
     *
     * @access private
     * @var string
     */
    private static $_instance = NULL;
    /**
     *
     * @access private
     * @var string
     */
    private $_xml;
    /**
     *
     * @access public
     * @var string
     */
    public static $_newFile = NULL;
    
    /**
     * Construct
     *
     * @access private
     */
    private function __construct()
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
            self::$_instance = new Parser();
        }
        return self::$_instance;
    }

    /**
     * Getter. XHTML
     *
     * @access public
     */
    public function getXML()
    {
        return $this->_xml;
    }
    
    /**
     * Getter. File path
     *
     * @access public
     */
    public function getFilePath()
    {
        return self::$_newFile;
    }

    /**
     * Merge WordML into a DOCX. WordML is added at the end of the document
     * 
     * @access public
     * @param  $path File path
     * @param  $newXML New XML
     * @throws Exception
     */
    public function mergeFile($path, $newXML)
    {
        if(!self::$_newFile) {
            // XXX change using getTempDir method
            self::$_newFile = tempnam(sys_get_temp_dir(), 'merge_phpdocx');
            copy($path, self::$_newFile);
        }
        if (file_exists(self::$_newFile)) {
            // open DOCX file
            $docx = new ZipArchive();
            $docx->open(self::$_newFile);
            // read document.xml file
            $fullContent = $docx->getFromName('word/document.xml');
            // add new WordML at the end of the document
            $fullContent = str_replace('<w:sectPr', $newXML . '<w:sectPr',
                $fullContent);
            $docx->addFromString('word/document.xml', $fullContent);
            $docx->close();
        } else {
            throw new Exception('File does not exist');
        }
    }

    /**
     * Read DOCX file and extract WordML content
     * 
     * @access public
     * @param  $path File path
     */
    public function readFile($path)
    {
        $this->_xml = '';
        if (file_exists($path)) {
            // open DOCX file
            $docx = new ZipArchive();
            $docx->open($path);
            // read document.xml file
            $fullContent = $docx->getFromName('word/document.xml');
            // remove not WordML w:body
            $startedRemovedUnwantedContent = explode('<w:body>', $fullContent);
            $endedRemovedUnwantedContent = explode('<w:sectPr', $startedRemovedUnwantedContent[1]);
            $this->_xml = $endedRemovedUnwantedContent[0];
            $docx->close();
        } else {
            throw new Exception('File does not exist');
        }
    }

}
