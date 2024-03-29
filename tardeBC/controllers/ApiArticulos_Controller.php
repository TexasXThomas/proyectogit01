<?php

class Apiarticulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function render()
    {

    }

    public function listar()
    {
        $mensaje   = "Hola desde la Api";
        $lista     = $this->model->listar();
        $respuesta = [
            "lista" => $lista,
            "totalResultados" => count($lista),
            "mensaje" => $mensaje,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render("apiarticulos/listar");
    }

    public function crear()
    {
        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $obj = json_decode($json);

        $articulo              = new Articulo();
        $articulo->codigo      = $obj->codigo;
        $articulo->descripcion = $obj->descripcion;
        $articulo->precio      = $obj->precio;
        $articulo->fecha       = $obj->fecha;
        //array_push($listaArticulos, $articulo);
        //$items[] = $item;

        $resultado = $this->model->crear($articulo);
        //$articulo->id = $obj->id;
        //$articulo->nombre = $obj->nombre;
        //$articulos = $this->model->get();
        //$this->view->articulos = json_encode($articulos);
        //$listaObjetos = json_encode($listaArticulos);

        $respuesta = [
            "ArituloId" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render("apiarticulos/crear");
    }
    //var_dump($this);
    //var_dump($this->view);
} //end crear