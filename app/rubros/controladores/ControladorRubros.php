<?php
require_once 'app/rubros/modelos/ModeloRubros.php';
require_once 'app/rubros/vistas/VistaRubros.php';

class ControladorRubros
{
    //definimos las propiedades
    private $modelo;
    private $vista;
    
    //los metodos se llaman function
    public function __construct() {
        $this->vista=new VistaRubros();
        $this->modelo=new ModeloRubros();
        
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