<?php
include_once '../../app/conexion.inc.php';
$titulo = "Landing page";
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
		<title>ADMEV Principal</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
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
		<a class="navbar-brand"  href="../landing-page/landing-page.php">ADMEV</a>
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
<!-- -------------------Carrusel de Imagenes ------------------------->

<div class="flex-container">
  <div class="col-dx"  style="background-color:#fff;">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item">
          <img class="center-block"  src="http://newsnet.conacytprensa.mx/media/com_hwdmediashare/files/c1/69/ab/778cc2a30034760f24b0098e2f40d00a.jpg" alt="First slide" style="width: 100%; height: 100%">
        </div>

        <div class="carousel-item">
          <img class="center-blok" src="http://www.unionjalisco.mx/sites/default/files/styles/galeria/public/field/image/cucei.png?itok=AQtwTbcR" alt="Second slide" style="width: 100%;height: 100%">
        </div>

        <div class="carousel-item active">
          <img class="center-block" src="https://static.panoramio.com.storage.googleapis.com/photos/large/3406085.jpg" alt="Third slide" style="width: 100%;height: 100%">
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<br>
<!-- -------------------Descripcion ------------------------->

	<div class="flex-container" >
		<!--<div class="col col-lg-2">-->
		<div>
			<div>
				<h3 style="color: #3bd65f; font-weight: bold" >ADMEV</h3>
				<p>Aqui encontraras informacion sobre el calendario de los eventos realizados en los auditorios de CUCEI, asi como las caracteristicas y la posibilidad de solicitar uno de estos espacios cuando lo necesites con 15 dias de anticipacion para verificar tu solicitud.</p>
			</div>
<!---------------------Proximos Eventos ------------------------->
			<div>
				<div class="alert alert-success">
					<h2>Proximos Eventos</h2>
				</div>

					<div class="flex-container">
						<div>
							<img src="https://i.pinimg.com/originals/d6/22/88/d6228866abd6f855da9a12e8141fbdba.gif"  style="width: 190px;height: 300px ">

							<img src="https://i.pinimg.com/564x/3d/46/1d/3d461d7bead21e905b07d0421acd64d9.jpg"  style="width: 190px;height: 300px">

							<img src="https://i.pinimg.com/564x/8c/dd/38/8cdd38a5d78aa6364084c790e7038079.jpg"  style="width: 190px;height: 300px">
						</div>
					</div>
			</div>
		</div>
<!-- -------------------Calendario ------------------------->
		<!--<div class="col"  style="background-color:#fff;">-->
		<div>
			<iframe src="https://calendar.google.com/calendar/b/1/embed?title=ADMEV&amp;showPrint=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%2399ff99&amp;src=54plri28kbvcvqisthdovtn4ps%40group.calendar.google.com&amp;color=%238D6F47&amp;src=es.mexican%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=America%2FMexico_City" style="border-width:0" width="600" height="500" frameborder="50" scrolling="no"></iframe>
		</div>
	</div>
</body>
</html>
