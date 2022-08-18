<?php

#require_once 'entidades/alumno.php';
//require_once 'entidades/articulos.php';

class Login_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function obtenerUsuarioId($id)
    {
        $lista = unserialize($_SESSION['lista']);

        $i          = 1;
        $Usuario    = null;
        $encontrado = false;
        while ($i < count($lista) && !$encontrado) {
            # code...
            if ($lista[$i]->getId() == $id) {
                $Usuario    = $lista[$i];
                $encontrado = true;
            }
            $i++;
        }
        return $Usuario;
    }
}