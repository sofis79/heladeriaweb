<?p<?php
require_once("app/clientes/controladores/ControladorClientes.php");
require_once("app/productos/controladores/ControladorProductos.php");
require_once("app/rubros/controladores/ControladorRubros.php");
require_once("app/localidades/controladores/ControladorLocalidades.php");

class ControladorPrincipal{
  //es el método más importante porque evalua las variables que llegan en 
  //la URL y a partir del valor de esas variables, crea una instancia de el
  //controlador del módulo o sección que corresponda, además analizará tanto
  //la variable "seccion" como la variable "accion" para llamar a los 
  //métodos correspondientes. Ej: ?seccion=clientes&accion=nuevo
  //instancia al ControladorCliente y llama al método nuevoCliente
  //$controladorClientes=new ControladorClientes();
  //$controladorClientes->nuevoCliente(); 
  public static function index(){
    echo "<div class='container'>
            <h1>Aplicación: HeladeriaWeb - V 0.0.1</h1>
            <p>4to Año 2017.</p>";
    //si existe la variable "seccion"
    if (isset($_REQUEST['seccion']))
    {
      switch ($_REQUEST['seccion']) {
        case 'productos':  //si vale "productos"
          $controladorProductos=new ControladorProductos();
          break;
        
        case 'clientes':  //si vale "clientes"
          $controladorClientes=new ControladorClientes();
          break;

        case 'rubros':  //si vale "rubros"
          $controladorRubros=new ControladorRubros();
          break;
        case 'localidades':
          $controladorLocaliades=new ControladorLocalidades();
          break;
      }
    }
    echo "</div>";
  }

  //crea el menú principal de la aplicación web, permitiendo el acceso a los
  //diferentes módulos (clientes, productos)
  public static function enlaces(){
    echo "<nav class='navbar navbar-default' role='navigation'>
        <div class='navbar-header'>
    <button type='button' class='navbar-toggle' data-toggle='collapse'
            data-target='.navbar-ex1-collapse'>
      <span class='sr-only'>Desplegar navegación</span>
      <span class='icon-bar'></span>
      <span class='icon-bar'></span>
      <span class='icon-bar'></span>
    </button>
    <a class='navbar-brand' href='#'></a>
    <img src='static/images/logo.png' width='130' height='71' alt='Logo' />
  </div>
        <div class='collapse navbar-collapse navbar-ex1-collapse'>        
          <ul class='nav navbar-nav navbar-right'>    
            <li class='dropdown'><a href='#' data-toggle='dropdown' class='dropdown-toggle'>Productos<b class='caret'></b></a>
               <ul class='dropdown-menu'>
                <li><a href='index.php?seccion=productos'>Lista de Productos</a></li>
                <li><a href='index.php?seccion=productos&accion=nuevoProducto'>Nuevo producto</a></li>
               </ul>               
            </li>
            <li class='dropdown'><a href='#' data-toggle='dropdown' class='dropdown-toggle'>Clientes<b class='caret'></b></a>
               <ul class='dropdown-menu'>
                <li><a href='index.php?seccion=clientes'>Listado de Clientes</a></li>
                <li><a href='index.php?seccion=clientes&accion=nuevoCliente'>Nuevo cliente</a></li>            
               </ul>               
            </li>
            <li class='dropdown'><a href='#' data-toggle='dropdown' class='dropdown-toggle'>Rubros<b class='caret'></b></a>
               <ul class='dropdown-menu'>
                <li><a href='index.php?seccion=rubros'>Lista de Rubros</a></li>
                <li><a href='index.php?seccion=rubros&accion=nuevoRubro'>Nuevo rubro</a></li>           
               </ul>               
            </li>
            <li class='dropdown'><a href='#' data-toggle='dropdown' class='dropdown-toggle'>Localidades<b class='caret'></b></a>
               <ul class='dropdown-menu'>
                <li><a href='index.php?seccion=localidades'>Lista de Localidades</a></li>
                <li><a href='index.php?seccion=localidades&accion=nuevaLocalidad'>Nueva Localidad</a></li>        
               </ul>           
            </li>            
          </ul>
          </div>
        </div>
      </nav>";    
  }

  //metodo estatico que arma el encabezado de las páginas Html, title, head, insertando el 
  //código CSS, javascript (bootstrap,Jquery)
  public static function encabezadoHtml(){
    echo "<!DOCTYPE html>
      <html>
          <head>
              <meta http-equiv='Content-type' content='text/html;charset=utf-8' />
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <link href='static/css/bootstrap.css' rel='stylesheet'>
          <link href='static/css/fileinput.css' media='all' rel='stylesheet' type='text/css'/>
          <script src='static/js/jquery.min.js'></script>
          <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
          <script src='static/js/fileinput.js' type='text/javascript'></script>
          <script src='static/js/es.js' type='text/javascript'></script>             
          </head>
        <body>";
    
  }
}

