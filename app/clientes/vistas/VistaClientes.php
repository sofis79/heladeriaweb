<?php
require_once 'app/core/HelperVistas.php';
class VistaClientes
{
  public function listar($clientesObt)
  {
    echo "<table border='1' class='table table-bordered table-hover'>
         <tr>
            <th>ID</th>
            <th>Apellido y Nombre</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>Localidad</th>
            <th></th>
            <th></th>
          </tr>";
        while ($cliente=mysqli_fetch_array($clientesObt))
        {
          $id=$cliente['clientesid'];
          $nombre=$cliente['clientesnombre'];
          $dni=$cliente['clientesdni'];
          $telefono=$cliente['clientestelefono'];
          $enlaceEditar="index.php?seccion=clientes&accion=editar&id=$id";
          $enlaceEliminar="index.php?seccion=clientes&accion=eliminar&id=$id";
          $onclick='return confirm("¿Seguro quiere eliminar al cliente '.$nombre.'")';
          echo "<tr>
                <td>$id</td>
                <td>$nombre</td>
                <td>$dni</td>
                <td>$telefono</td>";
            echo "<td>".$cliente['localidadesnombre']."</td>";
            //tambien se puede concatenar de formato directo del array
            //en vez de hacer variables
            echo "<td><a href='$enlaceEditar'</a>Editar</td>
                <td><a href='$enlaceEliminar' onclick='$onclick' >Eliminar</a></td>";
             echo "</tr>";
        }
        echo "</table>";
  }
  public function nuevo() {
    $formulario = file_get_contents('static/formularioclientes.html');
    $datosCliente=array('{clientesid}'=>'',
      '{clientesnombre}'=>'', 
      '{clientesdni}'=>'',  
      '{clientesfechanacimiento}'=>'',
      '{clientestelefono}'=>'',
      '{contenidoCboLocalidad}'=> HelperVistas::obtenerContenidoCboLocalidades(0),
      '{clientesfoto}'=>'silueta.png');

    foreach ($datosCliente as $clave => $valor) {
      $formulario = str_replace($clave, $valor, $formulario);
    }
    print $formulario;
  }
    public function editar($registroEditado){
        $formulario = file_get_contents('static/formularioclientes.html');
        if ($registroEditado['clientesfoto']=="")
            $foto="silueta.png";
        else
            $foto=$registroEditado['clientesfoto'];
        
        $datosCliente=array('{clientesid}'=>$registroEditado['clientesid'],
                        '{clientesnombre}'=>$registroEditado['clientesnombre'],
                        '{clientesdni}'=>$registroEditado['clientesdni'],
                        '{clientesfechanacimiento}'=>$registroEditado['clientesfechanacimiento'],
                        '{clientestelefono}'=>$registroEditado['clientestelefono'],
                        '{contenidoCboLocalidad}'=> HelperVistas::obtenerContenidoCboLocalidades($registroEditado['clienteslocalidadesid']),
                        '{clientesfoto}'=>$foto);
        foreach ($datosCliente as $clave => $valor) {
          $formulario = str_replace($clave, $valor, $formulario);
    }
    print $formulario;
  }
}