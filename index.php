<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Geral\Page;
use \Geral\Model\User;
use \Geral\Model\Student;
use \Geral\Model\Gate;
use \Geral\Model\Loglive;

$app = new Slim();
$app->config('debug', true);

require_once("functions.php");

/*********************************************************************************/
/********************************* Inicio Rotas **********************************/
/*********************************************************************************/

$app->post('/admin/users/password/:id', function($id) {

    if (!isset($_POST['despassword']) || $_POST['despassword'] === ''){
        User::setError("Preencha Nova Senha");
        header("Location: /admin/users/password/$id");
        exit;
    }

    if (!isset($_POST['despassword-confirm']) || $_POST['despassword-confirm'] === ''){
        User::setError("Por Favor, Confirme a Senha");
        header("Location: /admin/users/password/$id");
        exit;
    }

    if ($_POST['despassword'] !== $_POST['despassword-confirm']){
        User::setError("Por Favor, Confirme a Senha");
        header("Location: /admin/users/password/$id");
        exit;
    }    

    $user = new User();

    $user->get((int)$id);

    $user->setPassword($_POST['despassword']);

    User::setSuccess("Senha alterada com sucesso");

    header("Location: /admin/users/password/$id");
    exit;
    
});

$app->get('/admin/users/password/:id', function($id) {

    $user = new User();

    $user->get((int)$id);    

    $page = new Page();

	$page->setTpl("users-password",[
        "user"=>$user->getValues(),
        "msgError"=>User::getError(),
        "msgSuccess"=>User::getSuccess()
    ]);
    
});

$app->get('/admin/student/update/:id', function($id) {

    $student = new Student();

    $student->get((int)$id);    

    $page = new Page();

	$page->setTpl("student-update",[
        "student"=>$student->getValues()
    ]);
    
});

$app->post('/admin/student/update/:id', function($id) {

    $student = new Student();

    $student->get((int)$id);    

    if(isset($_POST['desstatus'])){
        if ($_POST['desstatus'] === "on" || $_POST['desstatus'] === "1")
            $_POST['desstatus'] = '1';
        else
            $_POST['desstatus'] = '0';    
    }else{
        $_POST['desstatus'] = '0';
    }

    if($_FILES["file"]["name"] !== "") 
        $_POST['dephoto'] = 1;     

    if(isset($_POST['fident'])){       
        if ($_POST['fident']  === "1")
            $_POST['dephoto'] = 0;
    }        

    $student->setData($_POST);

    $student->save();

    if($_FILES["file"]["name"] !== "")
        $student->setPhoto($_FILES["file"]);    

    header("Location: /admin/students");
    exit;    
});

$app->get('/admin/student/delete/:id', function($id) {

    $student = new Student();

    $student->get((int)$id);    

    $student->delete();

    header("Location: /admin/students");
    exit;
    
});

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

    if(isset($_POST['desstatus'])){
        if ($_POST['desstatus'] === "on" || $_POST['desstatus'] === "1")
            $_POST['desstatus'] = '1';
        else
            $_POST['desstatus'] = '0';    
    }else{
        $_POST['desstatus'] = '0';
    }

    if($_FILES["file"]["name"] !== "") 
        $_POST['desurl'] = 1; 

    if(isset($_POST['fident'])){
        /*
        var_dump($_POST['fident']);
        exit;*/        
        if ($_POST['fident']  === "1")
            $_POST['desurl'] = 0;
    }
         

    $user->setData($_POST);

    $user->save();

    if($_FILES["file"]["name"] !== "")
        $user->setPhoto($_FILES["file"]);    

    header("Location: /admin/users");
    exit;
    
});

$app->post('/admin/student/create', function() {

    $student = new Student();

    $_POST['id'] = 0;

    if ($_POST['desstatus'] === "on" || $_POST['desstatus'] === "1")
        $_POST['desstatus'] = '1';
    else
        $_POST['desstatus'] = '0';
    
    if($_FILES["file"]["name"] !== "") 
        $_POST['dephoto'] = 1;

    $student->setData($_POST);

    $student->save();

    if($_FILES["file"]["name"] !== "")
        $student->setPhoto($_FILES["file"]);
    
    header("Location: /admin/students");
    exit;    
        
});

$app->get('/admin/student/create', function() {

	$page = new Page();

    $page->setTpl("student-create");
        
});

$app->get('/admin/users/create', function() {

	$page = new Page();

    /*
    $user = new User();
    $_POST['id'] = 0;    
    $user->setData($_POST);
    $user->save();
    if($_FILES["file"]["name"] !== "")
        $user->setPhoto($_FILES["file"]);*/
    
    $page->setTpl("users-create");
    
});

$app->post('/admin/users/create', function() {

    $user = new User();

    $_POST['id'] = 0;
    $_POST['desstatus'] = 1;
    $_POST['dtcadastro'] = date('Y-m-d H:i:s');
    
    if($_FILES["file"]["name"] !== "") 
        $_POST['desurl'] = 1;

    $user->setData($_POST);

    $user->save();

    if($_FILES["file"]["name"] !== "")
        $user->setPhoto($_FILES["file"]);
    
    header("Location: /admin/users");
    exit;
    
});

$app->get('/admin/painelcontrol', function() {    

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

    $page->setTpl("painel-control");
     
	/*$page->setTpl("painel-control", [
        'loglive'=>Loglive::getLive()
    ])*/   
});


$app->get('/admin/log', function() {

    $search = (isset($_GET['search'])) ? $_GET['search'] : "";
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    if ($search != '') {
        $pagination = Gate::getPageSearch($search, $page, 10);

    }else{
        $pagination = Gate::getPage($page, 10);

    }

    $pages = [];

    for ($x = 0; $x < $pagination['pages']; $x++){
        array_push($pages, [
            'href'=>'/admin/log?'.http_build_query([
                'page'=>$x+1,
                'seach'=>$search
            ]),
            'text'=>$x+1
        ]);
    }

	$page = new Page();

	/*$page->setTpl("loglistregistrygate",[
		'log'=>Gate::listAll()
    ]);*/
	$page->setTpl("loglistregistrygate",[
        "log"=>$pagination['data'],
        "search"=>$search,
        "pages"=>$pages
	]);    
    
});

$app->get('/admin/students', function() {

	$page = new Page();

	$page->setTpl("students",[
		'students'=>Student::listAll()
	]);
    
});

$app->get('/admin/users', function() {

	$page = new Page();

	$page->setTpl("users",[
		'users'=>User::listAll()
	]);
    
});

$app->post('/admin/login', function() {
    
    $login = (isset($_GET['login'])) ? $_GET['login'] : "";    
    $password = (isset($_GET['password'])) ? $_GET['password'] : "";

    
    if ($login === "" || $password === ""){
        User::clearFailLogin();

        User::setFailLogin("Preencha o login e senha");

        header("Location: /");
        exit;
    }

    if (!User::doLogin($login, $password)){
        User::clearFailLogin();

        User::setFailLogin("Usuário inexistente ou senha incorreta, por favor verifique");

        header("Location: /");
        exit;
    }

    



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

	$page->setTpl("login", [
        'msgError'=>User::getFailLogin()
    ]);
    
});

/******************************************************************************/
/********************************* Fim Rotas **********************************/
/******************************************************************************/
$app->run();
?>