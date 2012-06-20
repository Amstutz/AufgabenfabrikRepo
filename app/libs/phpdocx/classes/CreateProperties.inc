<?php

/**
 * Create properties
 *
 * @category   Phpdocx
 * @package    elements
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.2
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.2
 */
include_once dirname(__FILE__) . '/CreateElement.inc';

/**
 * Create properties
 *
 * @category   Phpdocx
 * @package    elements
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.2
 * @link       http://www.phpdocx.com
 * @since      Class available since Release 2.2
 */
class CreateProperties extends CreateElement
{
	const NAMESPACEDC = 'dc';
	const NAMESPACECP = 'cp';
	const NAMESPACEVT = 'vt';
	const PROPERTYID = 'D5CDD505-2E9C-101B-9397-08002B2CF9AE';
	
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
    private static $_pid = 3;
    
    /**
     * Destruct
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
            self::$_instance = new CreateProperties();
        }
        return self::$_instance;
    }

    /**
     * Create properties
     *
     * @access public
     * @param mixed $args[0]
     */
    public function CreateProperties()
    {
        $this->_xml = '';
        $args = func_get_args();
        
        $title = $args[0]['title'];
        $subject = $args[0]['subject'];
        $creator = $args[0]['creator'];
        $keywords = $args[0]['keywords'];
        $description = $args[0]['description'];
        $category = $args[0]['category'];

        $this->generateTITLE($title);
        $this->generateSUBJECT($subject);
        $this->generateCREATOR($creator);
        $this->generateKEYWORDS($keywords);
        $this->generateDESCRIPTION($description);
        $this->generateCATEGORY($category);
        
    }

    /**
     * Create properties
     *
     * @access public
     * @param mixed $args[0]
     */
    public function createPropertiesApp()
    {
        $this->_xml = '';
        $args = func_get_args();
        
        $manager = $args[0]['manager'];
        $company = $args[0]['company'];

        $this->generateMANAGER($manager);
        $this->generateCOMPANY($company);
        
    }

    /**
     * Create custom properties
     *
     * @access public
     * @param mixed $args[0]
     */
    public function createPropertiesCustom()
    {
        $this->_xml = '';
        $args = func_get_args();
        
        $customProps = $args[0];
        foreach ($customProps as $prop) {
	        $this->generatePROPERTY($prop['title'], self::$_pid);
	        $this->generateLPWSTR($prop['value']);
	        self::$_pid++;
        }
    }
    
    /**
     * Generate cp:category
     *
     * @access protected
     */
    protected function generateCATEGORY($category)
    {
        $xml = '<' . self::NAMESPACECP . ':category>' . $category . '</'
        		. self::NAMESPACECP . ':category>';
        $this->_xml = str_replace('__GENERATECATEGORY__', $xml, $this->_xml);
    }
    
    /**
     * Generate Company
     *
     * @access protected
     */
    protected function generateCOMPANY($category)
    {
        $xml = '<Company>' . $category . '</Company>';
        $this->_xml = str_replace('__GENERATECOMPANY__', $xml, $this->_xml);
    }

    /**
     * Generate dc:creator
     *
     * @access protected
     */
    protected function generateCREATOR($creator)
    {
        $xml = '<' . self::NAMESPACEDC . ':creator>' . $creator . 
        		'</' . self::NAMESPACEDC . ':creator>__GENERATEKEYWORDS__';
        $this->_xml = str_replace('__GENERATECREATOR__', $xml, $this->_xml);
    }    
    
    /**
     * Generate cp:description
     *
     * @access protected
     */
    protected function generateDESCRIPTION($description)
    {
        $xml = '<' . self::NAMESPACEDC . ':description>' . $description . '</'
        		. self::NAMESPACEDC . ':description>__GENERATECATEGORY__';
        $this->_xml = str_replace('__GENERATEDESCRIPTION__', $xml, $this->_xml);
    }
    
    /**
     * Generate cp:keywords
     *
     * @access protected
     */
    protected function generateKEYWORDS($keywords)
    {
        $xml = '<' . self::NAMESPACECP . ':keywords>' . $keywords . 
        		'</' . self::NAMESPACECP . ':keywords>__GENERATEDESCRIPTION__';
        $this->_xml = str_replace('__GENERATEKEYWORDS__', $xml, $this->_xml);
    }
    
    /**
     * Generate vt:lpwstr
     *
     * @access protected
     */
    protected function generateLPWSTR($value)
    {
        $xml = '<' . self::NAMESPACEVT . ':lpwstr>' . $value. '</'
        		. self::NAMESPACEVT . ':lpwstr>';
        $this->_xml = str_replace('__GENERATELPWSTR__', $xml, $this->_xml);
	}
    
    /**
     * Generate Manager
     *
     * @access protected
     */
    protected function generateMANAGER($manager)
    {
        $this->_xml = '<Manager>' . $manager . '</Manager>__GENERATECOMPANY__';
    }
    
    /**
     * Generate property
     *
     * @access protected
     */
    protected function generatePROPERTY($title, $pid)
    {
        $this->_xml .= '<property fmtid="{' . self::PROPERTYID . '}" ' .
        		'pid="' . $pid . '" name="' . $title . '">' .
        		'__GENERATELPWSTR__</property>';
    }
    
    /**
     * Generate dc:subject
     *
     * @access protected
     */
    protected function generateSUBJECT($subject)
    {
        $xml = '<' . self::NAMESPACEDC . ':subject>' . $subject . 
        		'</' . self::NAMESPACEDC . ':subject>__GENERATECREATOR__';
        $this->_xml = str_replace('__GENERATESUBJECT__', $xml, $this->_xml);
    }
    
    /**
     * Generate dc:title
     *
     * @access protected
     */
    protected function generateTITLE($title)
    {
        $this->_xml = '<' . self::NAMESPACEDC . ':title>' . $title . 
        		'</' . self::NAMESPACEDC . ':title>__GENERATESUBJECT__';
    }

}
