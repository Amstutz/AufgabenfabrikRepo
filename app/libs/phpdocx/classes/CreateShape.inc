<?php

/**
 * Create shape
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
 * Create shape
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
class CreateShape extends CreateElement
{
    const NAMESPACEWORDSHAPES = 'v';
    
    /**
     *
     * @access private
     * @var string
     */
    private static $_instance = NULL;

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
            self::$_instance = new CreateShape();
        }
        return self::$_instance;
    }

    /**
     * Create shape
     *
     * @access public
     * @param mixed $args[0]
     * @param array $args[1]
     */
    public function createShape()
    {
        $this->_xml = '';
        $args = func_get_args();

        $this->generateP();
        $this->generateR();
        $this->generatePICT();
        if ($args[0] == 'line') {
          	$this->generateLINE($args[1]);
        }
    }

    /**
     * Generate v:line
     *
     * @access protected
     * @param string $args[0]
     */
    protected function generateLINE()
    {
    	$args = func_get_args();
    	$style = '';
        if (!empty($args[0]['height']))
            $style .= 'height:' . $args[0]['height'] . ';';
        else
            $style .= 'height:0;';
        if (!empty($args[0]['width']))
            $style .= 'width:' . $args[0]['width'] . ';';
    	
        $this->_xml = str_replace(
            '__GENERATEPICT__', '<' . CreateShape::NAMESPACEWORDSHAPES .
            ':line style="' . $style . '"/>', $this->_xml
        );
    }
}
