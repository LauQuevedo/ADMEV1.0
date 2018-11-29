<?php
include_once '../../app/conexion.inc.php';
$titulo = "Nuevo usuario";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admev | Nuevo Usuario</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="../login/login.php">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Solicitud</a>
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
<!-- -------------------Formulario de nuevo usuario------------------------->

	<div>

        <form>
<!-- -------------------Info de Cuentaflex-container------------------------->
          <div style="padding: 1%">
          <h6>Ingresa la siguiente informacion para crear tu cuenta</h6>
          <hr align="left" size="2" width="80%"> </hr>
          </div>
          <div class="container">
            <div class="form-group">
            	<div class="row">
	              <div class="col-sm">
	              <label for="validation01">Nombres</label>
	              <input type="text" class="form-control is-valid" id="validation01" placeholder="Nombres" value="" required>
	            </div>
	            <div class="col-sm">
	              <label for="validation01">Apellidos</label>
	              <input type="text" class="form-control is-valid" id="validation01" placeholder="Apellidos" value="" required>
	            </div>
	            <div class="col-sm">
              	   <label for="validation01">Codigo de UdeG</label>
                   <input type="text" class="form-control is-valid" id="validation01" placeholder="Codigo" value="" required>
            	</div>
            	<div class="col-sm">
	               <label for="validation01">Puesto</label>
	               <br>
	               <select class="btn btn-default " >
	                  <option>Coordinador</option>
	                  <option>Profesor</option>
	                  <option>Administrativo</option>
	              </select>
	            </div>
	       	</div>

           <div class="row">
	            <div class="col-sm-4">
	            	<br>
	            	<span id="reauth-email" class="reauth-email"></span>
	                <input type="text" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
	            </div>
	            <div class="col-sm-4">
					</br>
	                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
            	</div>
            	<div class="col-sm-2">
            		<br>
            		<button class="btn btn-lg btn-block btn-signin btn-primary" type="submit">Crear</button>
            	</div>
        	</div>

          </div>
        </div>
        <div class="flex-container">
			<div>
				<img class="img-fluid img-thumbnail" src="https://www.roastbrief.com.mx/wp-content/uploads/2018/07/roastbrief-oratoria-7-consejos-para-dar-conferencias-inolvidables-780x405.jpg" style="width:80% ; height: 80%">
			</div>
		</div>

</body>
</html>
