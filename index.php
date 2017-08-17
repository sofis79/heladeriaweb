<?php
//equivalente al using en C#, habilitabaos el suo de la clase controlador principal
require_once("app/core/ControladorPrincipal.php");
ControladorPrincipal::encabezadoHtml();
ControladorPrincipal::enlaces();
ControladorPrincipal::index();
