<?php

class VistaRubros
{
  public function listar($rubrosObt)
  {
    echo "<table border='1' class='table table-bordered table-hover'>
         <tr>
            <th>ID</th>
            <th>Rubro</th>            
            <th></th>
            <th></th>
          </tr>";
        while ($rubro=mysqli_fetch_array($rubrosObt))
        {
          $id=$rubro['rubrosid'];
          $nombre=$rubro['rubrosnombre'];
          $enlaceEditar="index.php?seccion=rubros&accion=editar&id=$id";
          $enlaceEliminar="index.php?seccion=rubros&accion=eliminar&id=$id";          
          $onclick='return confirm("¿Seguro quiere eliminar el rubro '.$nombre.'")';
          //$fechaNac=date_create($localidad['jugadoresfechanac']);
          //$fechaNacimiento=date_format($fechaNac,'d/m/Y');
          echo "<tr>
                <td>$id</td>
                <td>$nombre</td>";  
            
            echo "<td><a href=$enlaceEditar</a>Editar</td>
                 <td><a href='$enlaceEliminar' onclick='$onclick' >Eliminar</a></td>";
             echo "</tr>";
        }
        echo "</table>";
  }
}