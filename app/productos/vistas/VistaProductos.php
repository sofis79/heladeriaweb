<?php

class VistaProductos
{
  public function listar($productosObt)
  {
    echo "<table border='1' class='table table-bordered table-hover'>
         <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>precio</th>
            <th>Rubro</th>            
            <th></th>
            <th></th>
          </tr>";
        while ($producto=mysqli_fetch_array($productosObt))
        {
          $id=$producto['productosid'];
          $nombre=$producto['productosdescripcion'];
          $precio=$producto['productosprecio'];          
          $enlaceEditar="index.php?seccion=productos&accion=editar&id=$id";
          $enlaceEliminar="index.php?seccion=productos&accion=eliminar&id=$id";
          $onclick='return confirm("¿Seguro quiere eliminar el producto '.$nombre.'")';
          
          //$fechaNac=date_create($cliente['jugadoresfechanac']);
          //$fechaNacimiento=date_format($fechaNac,'d/m/Y');
          echo "<tr>
                <td>$id</td>
                <td>$nombre</td>
                <td>$precio</td>";                
            echo "<td>".$producto['rubrosnombre']."</td>";
            //tambien se puede concatenar de formato directo del array
            //en vez de hacer variables
            echo "<td><a href='$enlaceEditar'</a>Editar</td>
                <td><a href='$enlaceEliminar' onclick='$onclick' >Eliminar</a></td>";
             echo "</tr>";
        }
        echo "</table>";
  }
}