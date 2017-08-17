<?php
require_once 'app/productos/modelos/ModeloProductos.php';
require_once 'app/productos/vistas/VistaProductos.php';

class ControladorProductos
{
    //definimos las propiedades
    private $modelo;
    private $vista;
    
    //los metodos se llaman function
    public function __construct() {
        $this->vista=new VistaProductos();
        $this->modelo=new ModeloProductos();
        
        if (isset($_REQUEST['accion'])) 
            {
            switch ($_REQUEST['accion']) 
            {
                case 'listar':
                    $this->listar();
                    break;
                case 'eliminar':
                    $this->eliminar();
                    break;
                default:
                    $this->listar();
                    break;
            }
        } 
        else 
            $this->listar();
    }
    public function listar()
    {
    $registrosObtenidos=$this->modelo->obtenerTodos();
    //var_dump($registrosObtenidos);
    $this->vista->listar($registrosObtenidos);
    } 
    public function eliminar()
    {
        echo 
        $this->modelo->eliminar();
        $this->listar();
    }
}