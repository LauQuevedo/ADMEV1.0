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
		<title>Admev | Auditorio Antonio</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/main.css">
		<link href="jquery.bsPhotoGallery.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../img/admev.ico" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="jquery.bsPhotoGallery.js"></script>

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
				</li>
			</ul>
		</div>
	</div>
</nav>

<!---------------------------------Nombre Auditorio--------------------------------->

	<div class="page-header AudiTitle AudiTitle" style="padding: 2%">
	  <h1><small> 	Auditorio </small> Antonio Rodriguez<h1>
	</div>

<div class="flex-container" >
	<div>
		<div>
			<h3 style="color: #3bd65f; font-weight: bold" >Descripcion</h3>
			<p>Este auditorio es uno de los principales en el Centro Universitario auque es el mas pequeño de los mismos, tiene un escenario que se acopla a la sala y las bancas estan intercaladas para la correcta observacion de lo asistentes. </p>
		</div>
<!---------------------------------Galeria de Imagenes--------------------------------->

		<div>
			<div style="justify-content: center">
				<div class="row flex-conteiner" style="padding: 2%">
			    <div class="thumbnail">
			    	<a href="http://www.cucei.udg.mx/sites/default/files/noticias/084.jpg">
				      <img class="imgAudiGal" src="http://www.cucei.udg.mx/sites/default/files/noticias/084.jpg" href="http://www.cucei.udg.mx/sites/default/files/noticias/084.jpg">
				      <div class="caption">
				        <h6>Escenario</h6>
				      </div>
				    </a>
			    </div>
			    <div class="thumbnail">
		    		<a href="https://www.informador.mx/__export/1506053294077/sites/elinformador/img/historico/10/887800.jpg_1970638775.jpg">
				      <img class="imgAudiGal" src="https://www.informador.mx/__export/1506053294077/sites/elinformador/img/historico/10/887800.jpg_1970638775.jpg" href="https://www.informador.mx/__export/1506053294077/sites/elinformador/img/historico/10/887800.jpg_1970638775.jpg">
				      <div class="caption">
				        <h6>Edificio</h6>
				      </div>
				    </a>
		    	</div>
		    	<div class="thumbnail">
			   	  <a href="http://www.cucei.udg.mx/sites/default/files/noticias/toma_de_protesta_0.jpg">
				      <img class="imgAudiGal" src="http://www.cucei.udg.mx/sites/default/files/noticias/toma_de_protesta_0.jpg" href="http://www.cucei.udg.mx/sites/default/files/noticias/toma_de_protesta_0.jpg">
				      <div class="caption">
				        <h6>Asientos</h6>
			    	</div>
			    	</a>
			    </div>
		  	</div>
		  </div>
		</div>
<!---------------------------------Lista de equipamiento--------------------------------->

		<div class="flex-container">

			<div>
				<ul class="list-group">
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
		 				Modems
		    			<span class="badge badge-primary badge-pill">1</span>
		  			</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
						Pantallas
						<span class="badge badge-primary badge-pill">0</span>
					</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
		   			    Asientos
		    	    	<span class="badge badge-primary badge-pill">80</span>
		            </li>
				</ul>
			</div>
			<div>
				<ul class="list-group">
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
		  				Mesas presidium
		    			<span class="badge badge-primary badge-pill">1</span>
		  			</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
						Microfonos
						<span class="badge badge-primary badge-pill">2</span>
					</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
		   			    Entradas
		    	    	<span class="badge badge-primary badge-pill">1</span>
		            </li>
				</ul>
			</div>

		</div>




	</div>
<!---------------------------------Calendario--------------------------------->
		<div>
			<iframe src="https://calendar.google.com/calendar/b/1/embed?title=ADMEV&amp;showPrint=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%2399ff99&amp;src=54plri28kbvcvqisthdovtn4ps%40group.calendar.google.com&amp;color=%238D6F47&amp;src=es.mexican%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=America%2FMexico_City" style="border-width:0" width="600px" height="600px" frameborder="50" scrolling="no"></iframe>
		</div>
	</div>



</body>
