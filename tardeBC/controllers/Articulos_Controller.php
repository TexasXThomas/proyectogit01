<?php

class Articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }

    public function render()
    {
        $this->view->mensaje = "cargado";
        $this->view->render('articulos/index');

    }

    //base+login

    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->listar();
        //lo asigna a la varible articulos
        $this->view->lista = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
        $arr = [];
    }

    public function nuevo($param = null)
    {

        //obtiene todos los articulos
        //$articulos = $this->model->listar();
        //lo asigna a la varible articulos
        //$this->view->lista = $articulos;
        //lista los articulos
        $this->view->render('articulos/nuevo');
        //$arr = [];
    }

    public function crear()
    {

        //obtengo los datos de la peticion http, post body
        // $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        //$obj = json_decode($json);
        $codigo                = $_POST['codigo'];
        $descripcion           = $_POST['descripcion'];
        $precio                = $_POST['precio'];
        $fecha                 = $_POST['fecha'];
        $articulo              = new Articulo();
        $articulo->codigo      = $codigo;
        $articulo->descripcion = $descripcion;
        $articulo->precio      = $precio;
        $articulo->fecha       = $fecha;

        $resultado             = $this->model->crear($articulo);
        $this->view->resultado = $resultado;

        $this->view->render('articulos/crear');

    } //end crear
}
      