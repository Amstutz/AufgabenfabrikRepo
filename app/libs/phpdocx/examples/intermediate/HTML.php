<?php

/**
 * Create a DOCX file. Add HTML code in a DOCX file
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage intermediate
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    05.24.2001
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.2
 */
require_once('../../classes/CreateDocx.inc');
require_once('../../classes/TransformDoc.inc');
$docx = new CreateDocx();

$html = '
<span>
<h3>Dynamic DOCX generation. <span style="font-size: 17px; padding: 0pt; color: rgb(0, 0, 0); margin: 9px 0pt 0pt;"><img src="http://www.phpdocx.com/wp-content/themes/lightword/images/new.gif" style="vertical-align: middle;"> New 2.2 version<br>
  <strong style="color: rgb(4, 133, 232); font-weight: normal;">with support for OpenOffice Documents, rewritten and faster API<br>
    and  <a href="features" style="color: rgb(4, 133, 232);">new features</a>!</strong></span></h3>
<p>Do you need to dynamically generate Word documents?.</p>
<p> <strong>PHPDOCX</strong> do this and much more. You may create highly customized reports in Word extracting data directly from any database or spreadsheet. These reports may include editable graphs, images, tables, headers, footers, etcetera. <strong>PHPDOCX</strong>&nbsp; can create Word documents from scratch or use predefined templates to simplify your work. With a few lines of code you may integrate <strong>PHPDOCX</strong> in your website or intranet and offer a valuable service to your customers and employees..</p>

<div style="clear: both;"></div>

<a href="wordpress/download" class="download_home">DOWNLOAD NOW</a>
<p>Do you need this functionality with Java ?  <a href="http://www.javadocx.com" class="link_destacado">Try JavadocX!</a></p>
<div class="compatible">
<h3>100% compatibility</h3><h3>
    <img src="http://www.phpdocx.com/wp-content/themes/lightword/images/100_compatibility.gif" alt="100% compatibility"></h3></div>
</span>';

$docx->addHTML($html);

$html = '
<div class="index_caja">
<h2>What is PHPDOCX ?</h2>
<p><strong>PHPDOCX</strong> is a PHP library designed to generate completely dynamic and fully customizable Word documents. </p>
<p><strong>PHPDOCX</strong> is hosted in your server providing a very and complete flexible solution for your document and<strong> report generation needs</strong>.</p>
<h2>What can I do with PHPDOCX ?</h2>

<p>With a few lines of code you can generate a complete report that includes: </p>
<ul>
  <li> Editable Text</li>
  <li>Images and Graphic  	elements</li>
  <li>Standard paragraphs</li>
  <li>Bulleted or  	numbered lists</li>
  <li>Customized tables</li>

  <li>Dynamic  	tables</li>
  <li>All kind of  	customizable and editable charts or graphs to display numerical data</li>
  <li>Tables of content  	to simplify readability within long documents</li>
  <li>Headers that will  	reflect your corporate branding</li>
  <li>Footers with  	automatic page numbering </li>
  </ul>

<p>You could also create and use your own templates for Mailmerge or to generate really sophisticated reports and documents. </p>
<h2><a href="blog-news"><img src="http://www.phpdocx.com/wp-content/themes/lightword/images/index_blog.gif" alt="blog news"> Latest Blog entries</a></h2>
</div>';

$docx->addHTML($html);

$docx->createDocx('example_html');
$document = new TransformDoc();
$document->setStrFile('example_html.docx');
$document->generatePDF();
