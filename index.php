<?php 
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Geral\Page;

$app = new Slim();
$app->config('debug', true);


$app->get('/admin', function() {

	$page = new Page();

	$page->setTpl("index");
    
});

$app->get('/', function() {

    echo "1 2 3 Testando";
    
});

$app->run();
?>