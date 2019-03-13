<?php 
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Geral\Page;
use \Geral\Model\User;

$app = new Slim();
$app->config('debug', true);


/*********************************************************************************/
/********************************* Inicio Rotas **********************************/
/*********************************************************************************/

$app->get('/admin/users/delete/:id', function($id) {

    $user = new User();

    $user->get((int)$id);    

    $user->delete();

    header("Location: /admin/users");
    exit;
    
});

$app->get('/admin/users/update/:id', function($id) {

    $user = new User();

    $user->get((int)$id);    

    $page = new Page();

	$page->setTpl("users-update",[
        "user"=>$user->getValues()
    ]);
    
});

$app->post('/admin/users/update/:id', function($id) {

    $user = new User();

    $user->get((int)$id);    

    $page = new Page();

	$page->setTpl("users-update",[
        "user"=>$user->getValues()
    ]);
    
});

$app->get('/admin/users/create', function() {

	$page = new Page();

	$page->setTpl("users-create");
    
});

$app->post('/admin/users/create', function() {

	$page = new Page();

    $user = new User();

    $_POST['id'] = 0;
    $_POST['desstatus'] = 1;
    $_POST['dtcadastro'] = date('Y-m-d H:i:s');
    
    if($_FILES["file"]["name"] !== "") 
        $_POST['desurl'] = 1;
    else 
        $_POST['desurl'] = 0;

    $user->setData($_POST);

    $user->save();

    if($_FILES["file"]["name"] !== "")
        $user->setPhoto($_FILES["file"]);
    
    header("Location: /admin/users");
    exit;
    
});

$app->get('/admin/users', function() {

	$page = new Page();

	$page->setTpl("users",[
		'users'=>User::listAll()
	]);
    
});

$app->get('/admin', function() {

	$page = new Page();

	$page->setTpl("index");
    
});

$app->get('/', function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");
    
});

/******************************************************************************/
/********************************* Fim Rotas **********************************/
/******************************************************************************/
$app->run();
?>