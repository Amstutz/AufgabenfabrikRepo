<?php

/**
 * Create a DOCX file. Report example
 *
 * @category   Phpdocx
 * @package    examples
 * @subpackage advanced
 * @copyright  Copyright (c) 2009-2011 Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    http://www.phpdocx.com/wp-content/themes/lightword/pro_license.php
 * @version    2.2
 * @link       http://www.phpdocx.com
 * @since      File available since Release 2.2
 */
require_once '../../classes/CreateDocx.inc';

$docx = new CreateDocx();

// browser stats
$statsFeb2009Feb2010 = '
<STATS>
    <BROWSER>
        <NAME>Internet Explorer</NAME>
        <VALUE>58</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Firefox</NAME>
        <VALUE>31</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Chrome</NAME>
        <VALUE>4</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Safari</NAME>
        <VALUE>3</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Opera</NAME>
        <VALUE>2</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Other</NAME>
        <VALUE>2</VALUE>
    </BROWSER>
</STATS>
';

$statsFeb2010Feb2011 = '
<STATS>
    <BROWSER>
        <NAME>Internet Explorer</NAME>
        <VALUE>50</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Firefox</NAME>
        <VALUE>31</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Chrome</NAME>
        <VALUE>11</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Safari</NAME>
        <VALUE>4</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Opera</NAME>
        <VALUE>2</VALUE>
    </BROWSER>
    <BROWSER>
        <NAME>Other</NAME>
        <VALUE>2</VALUE>
    </BROWSER>
</STATS>
';

// add text and date in header
$header = 'Browsers stats';

$paramsHeader = array(
    'jc' => 'right',
    'textWrap' => 5,
);

$date = getdate();

$docx->addHeader($header . ' ' . $date['mon'] . '/' . $date['mday'] . '/'
    . $date['year'], $paramsHeader);

// add footer with pager
$footer = 'DOCX generated using PHPDOCX PRO.';

$paramsFooter = array(
    'pager' => 'true',
    'pagerAlignment' => 'center',
);

$docx->addFooter($footer, $paramsFooter);

// add chart title
$title = 'Browsers stats chart';

$paramsTitle = array(
    'val' => 1,
    'b' => 'single',
    'sz' => 22
);

$docx->addTitle($title, $paramsTitle);

// add line break
$docx->addBreak('line');
$docx->addBreak('line');
$docx->addBreak('line');

// read XML Feb209Feb2010
$xmlFeb2009Feb2010 = new DOMDocument(); 
$xmlFeb2009Feb2010->loadXML($statsFeb2009Feb2010);

// read XML Feb2010Feb2011
$xmlFeb2010Feb2011 = new DOMDocument(); 
$xmlFeb2010Feb2011->loadXML($statsFeb2010Feb2011);

// read stats and create charts
$legendsAndValues = array();

for ($i = 0; $i < $xmlFeb2009Feb2010->getElementsByTagName("NAME")->length; $i++) {
    $legendsAndValues[$xmlFeb2009Feb2010->getElementsByTagName("NAME")->item($i)->nodeValue] = array(
        $xmlFeb2009Feb2010->getElementsByTagName("VALUE")->item($i)->nodeValue
    );
}

$chart = array(
    'data' => $legendsAndValues,
    'type' => 'pie3DChart',
    'title' => 'Feb 2009 - Feb 2010',
    'cornerX' => 20, 'cornerY' => 20, 'cornerP' => 30,
    'color' => 2,
    'textWrap' => 0,
    'sizeX' => 14, 'sizeY' => 8,
    'jc' => 'center',
    'showPercent' => 1,
);

$docx->addGraphic($chart);

// add line break
$docx->addBreak('line');
$docx->addBreak('line');

$legendsAndValues = array();

for($i = 0; $i < $xmlFeb2010Feb2011->getElementsByTagName("NAME")->length; $i++) {
    $legendsAndValues[$xmlFeb2010Feb2011->getElementsByTagName("NAME")->item($i)->nodeValue] = array(
        $xmlFeb2010Feb2011->getElementsByTagName("VALUE")->item($i)->nodeValue
    );
}

$chart['data'] = $legendsAndValues;
$chart['title'] = 'Feb 2010 - Feb 2011';

$docx->addGraphic($chart);

// add page break
$docx->addBreak('page');

// add table title
$title = 'Browsers stats table';

$paramsTitle = array(
    'val' => 1,
    'b' => 'single',
    'sz' => 22
);

$docx->addTitle($title, $paramsTitle);

// add line break
$docx->addBreak('line');
$docx->addBreak('line');
$docx->addBreak('line');

// read stats and create table
$table = array();

$table[] = array(
    '',
    'Feb 2009 - Feb 2010',
    'Feb 2010 - Feb 2011',
);


for($i = 0; $i < $xmlFeb2009Feb2010->getElementsByTagName("NAME")->length; $i++) {
    $paramsHeaderTextTable[0] = array(
        'text' => $xmlFeb2009Feb2010->getElementsByTagName("NAME")->item($i)->nodeValue,
        'b' => 'single',
        'sz' => 14
    );
    
    $table[] = array(
        $docx->addElement('addText', $paramsHeaderTextTable),
        $xmlFeb2009Feb2010->getElementsByTagName("VALUE")->item($i)->nodeValue,
        $xmlFeb2010Feb2011->getElementsByTagName("VALUE")->item($i)->nodeValue
    );
}

$paramsTable = array(
    'border' => 'single',
    'border_sz' => 2,
    'jc' => 'center',
    'size_col' => 2800
);

$docx->addTable($table, $paramsTable);

// add page break
$docx->addBreak('page');

// add text
$textInfo = 'Stats are based on aggregate data collected by StatCounter on a'
. ' sample exceeding 15 billion pageviews per month collected from across'
. ' the StatCounter network of more than 3 million websites. Stats are '
. ' updated and made available every 4 hours, however are subject to '
. 'quality assurance testing and revision for 7 days from publication.';

$paramsTextInfo = array(
    'val' => 1,
    'i' => 'single',
    'sz' => 8
);

$docx->addText($textInfo, $paramsTextInfo);

// add link
$docx->addLink('Source: StatCounter', 'http://gs.statcounter.com');

// generate DOCX file
$docx->createDocx('example_report');