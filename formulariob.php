<?php
require_once 'clases/ControladorSesion.php';
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $cs = new ControladorSesion();
    $result = $cs->create($_POST['usuario'], $_POST['nombre'], 
                          $_POST['apellido'], $_POST['clave']);
    if( $result[0] === true ) {
        $redirigir = 'home.php?mensaje='.$result[1];
    } else {
        $redirigir = 'formulariob.php?mensaje='.$result[1];
    }
    header('Location: ' . $redirigir);
}
?><!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Formulario Buscar</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
                <!-- MENU DE INICIO -->
                <nav class="nav p-3 justify-content-end">
            <a href="inicio.html" class="nav-link active" aria-current="page">Inicio</a>
            <a href="#" class="nav-link active">Perdidos</a>
            <a href="msjV.html" class="nav-link active">Adoptar</a>
            <!-- Dropdown -->
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Realizar Publicacion
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="formulariob.php">Mascota Perdida</a></li>
                    <li><a class="dropdown-item" href="msjV.html">Dar en Adopcion</a></li>
                </ul>
            </div>
            <a href="msjV.html" class="nav-link active">          
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>    
            </a>
        </nav>
      <div class="jumbotron text-center">
      <h1>Publica los datos de tu mascota perdida 🐾</h1>
      </div>    
      <div class="text-center">
        <h3>🐾Formulario🐾</h3>
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form action="formulariob.php" method="post">
            <input name="usuario" class="form-control form-control-lg" placeholder="Usuario"><br>
            <input name="clave" type="password" class="form-control form-control-lg" placeholder="Contraseña"><br>
            <input name="nombre" class="form-control form-control-lg" placeholder="Nombre"><br>
            <input name="apellido" class="form-control form-control-lg" placeholder="Apellido"><br>
            <input type="submit" value="Registrarse" class="btn btn-primary">
        </form>        
      </div> 
    </body>
</html>
