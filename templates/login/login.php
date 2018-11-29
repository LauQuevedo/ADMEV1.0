<?php

include_once '../../app/config.inc.php';
include_once '../../app/conexion.inc.php';
include_once '../../app/login.inc.php';
include_once '../../app/validarLogin.inc.php';
include_once '../../app/redireccion.inc.php';
include_once '../../app/controlSesion.inc.php';

Conexion::abrirConexion();
$conexion = Conexion::obtenerConexion();
$sql = "SELECT * FROM auditorio;";

if(isset($conexion)) {
        try {
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            $auditorio = $sentencia->fetchAll();
        } catch (PDOException $ex) {
            print("ERROR: ".$ex->getMessage());
        }
}
Conexion::cerrarConexion();

/*
if(ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(SERVIDOR);
}*/
if(isset($_POST['login'])) {
    Conexion::abrirConexion();
    $validador = new ValidadorLogin($_POST['inputCodigo'], $_POST['inputPassword'], Conexion::obtenerConexion());
    if($validador->obtenerError() === '' &&
        !is_null($validador->obtenerUsuario())) {
            ControlSesion::iniciar_sesion($validador->obtenerUsuario()->getId(),
                $validador->obtenerUsuario()->getNombre());
            Redireccion::redirigir(SERVIDOR);
        //Iniciar session
    }

    Conexion::cerrarConexion();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admev | Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../img/admev.ico" />
	<link rel="stylesheet" href="../../css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<!-- -------------------Barra de navegacion superior ------------------------->
	<nav class="navbar navbar-expand-sm navbar-dark bg-success">
		<!-- Brand -->
		<div class="container">
			<a class="navbar-brand"  href="../../index.php">ADMEV</a>
			<a class="navbar-brand navbar-right"  href="http://www.cucei.udg.mx">CUCEI</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	      		<span class="navbar-toggler-icon"></span>
	      	</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="../formulario/formulario.php">Solicitud</a>
					</li>
					<!-- Dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
							AUDITORIOS
						</a>
						<div class="dropdown-menu bg-light " >
                            <?php
                                foreach ($auditorio as $row) {
                                    extract($row);
                                    $aux = explode(" ", $row['nombreAuditorio']);
                                    $aux = strtolower($aux[0]);
                                    echo "<a class='dropdown-item' href='../auditorios/".$aux.".php'>".$row['nombreAuditorio']."</a>";
                                }
                            ?>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
<!-- -------------------Log-In------------------------->
    <div class="flex-container">
       <div class="card-container">
           <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="img-circle" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="border-radius: 50%" />
            <p id="profile-name" class="profile-name-card"></p>
            <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
               <!--<span id="reauth-email" class="reauth-email"></span>>-->
               <input type="text" name="inputCodigo" class="form-control" placeholder="Codigo" required autofocus>
               </br>
               <input type="password" name="inputPassword" class="form-control" placeholder="Contraseña" required>
               <div id="remember" class="checkbox">
                   <label class="labelCheckbox">
                       <input type="checkbox" value="remember-me"> Recordar
                   </label>
               </div>
               <?php
                    if(isset($_POST['login'])) {
                        $validador->mostrarError();
                    }
                    ?>
               <button  type="submit" name="login" class="btn btn-lg btn-block btn-signin btn-primary" type="submit" >
                   Sign in
               </button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
               ¿Olvidaste tu contraseña?
            </a>
       </div>
    </div>
</body>
