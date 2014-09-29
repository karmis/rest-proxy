<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

use RestProxy\RestProxy;
use RestProxy\CurlWrapper;

$proxy = new RestProxy(
    Request::createFromGlobals(),
    new CurlWrapper()
    );
$proxy->register('necafe', 'ncfapi.apps.brainstrap.ru');
$proxy->run();

$headers = $proxy->getHeaders();
if (isset($headers)) {
	foreach($headers as $header) {
	    header($header);
	}
}


echo $proxy->getContent();
