<?php
require_once "app/core/HelperDatos.php";

class ModeloLocalidades
{
  public function obtenerTodos()
  {
    $miConexion=HelperDatos::obtenerConexion();
    $resultado=$miConexion->query("call obtener_localidades");
    return $resultado;
  }
  public function eliminar()
    {
      if (isset($_REQUEST['id']))
      {
      $id=$_REQUEST['id'];
      $miConexion=HelperDatos::obtenerConexion();
      $resultado=$miConexion->query("call eliminar_localidad($id)");      
      }
  }
  public function guardar(){
        $miConexion=HelperDatos::obtenerConexion();
        $id=$_REQUEST['txtClientesId'];
        $nom=$_REQUEST['txtClientesNombre'];
        $dni=$_REQUEST['txtClientesDni'];
        $fechanac=$_REQUEST['txtClientesFechaNacimiento'];
        $tel=$_REQUEST['txtClientesTelefono'];
        $fot='';
        $locid=1;
         $parametros="'$dni','$fechanac','$fot',$locid,'$nom','$tel'";
        //var_dump($parametros);
        $resultado=$miConexion->query("call insertar_cliente($parametros)");

    }
}
