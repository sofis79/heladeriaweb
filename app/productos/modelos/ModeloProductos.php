<?php
require_once "app/core/HelperDatos.php";

class ModeloProductos
{
  public function obtenerTodos()
  {
    $miConexion=HelperDatos::obtenerConexion();
    $resultado=$miConexion->query("call obtener_productos");
    return $resultado;
  }
  public function eliminar()
    {
      if (isset($_REQUEST['id']))
      {
      $id=$_REQUEST['id'];
      $miConexion=HelperDatos::obtenerConexion();
      $resultado=$miConexion->query("call eliminar_producto($id)");      
      }
  }
}