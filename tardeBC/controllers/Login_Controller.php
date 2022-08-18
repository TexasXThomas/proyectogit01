<?php
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';

class Login_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }

    //base+login
    public function render()
    {
        //$alumnos = $this->model->get();
        $this->view->alumnos = "cargado";
        $this->view->render('login/index');
    }

    public function ingresar()
    {
        $nombre     = $_POST['nombre'];
        $password   = $_POST['password'];
        $exitoLogin = $this->model->ingresar($nombre, $password);
    }
    public function salir()
    {
        //$_SESSION["estalogueado"] = false;
        unset($_SESSION["estalogueado"]);
        unset($_SESSION["nombre"]);
        session_destroy();
        $this->view->render('index/index');

    }
    public function login()
    {
        $this->view->render('login/login');

    }
    public function signin(){
        $user = new Usuario();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $id = $this->model->signin($user);
        $_SESSION['id'] = serialize($id);
        

        
    }
    
        }