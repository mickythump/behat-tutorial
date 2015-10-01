<?php
/**
 * Created by PhpStorm.
 * User: mikolaj
 * Date: 01.10.15
 * Time: 12:41
 */

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;

$driver = new GoutteDriver();
$session = new \Behat\Mink\Session($driver);

$session->start();
$session->visit('http://jurassicpark.wikia.com');

echo "Status code: ".$session->getStatusCode()."\n\n";
echo "Current URL: ".$session->getCurrentUrl()."\n\n";

$page = $session->getPage();

echo "First 160 chars: ".substr($page->getText(), 0, 160)."\n\n";

$element = $page->find('css', '.subnav-2 li a');

echo "The link text is: ".$element->getText()."\n\n";
echo sprintf("The URL is '%s'\n\n", $element->getAttribute('href'));

//$selectorHandler = $session->getSelectorsHandler();
//$element = $page->find('named', array('link', $selectorHandler->xpathLiteral('MinkExtension')));

$element = $page->findLink('Random page');
$element->click();

echo "Page URL after click: ".$session->getCurrentUrl()."\n\n";
