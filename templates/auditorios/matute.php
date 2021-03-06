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
		<title>Admev | Auditorio</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/main.css">
        <link rel="shortcut icon" href="../../img/admev.ico" />
		<link href="jquery.bsPhotoGallery.css" rel="stylesheet">
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

<!---------------------------------Nombre Auditorio--------------------------------->

	<div class="page-header AudiTitle AudiTitle" style="padding: 2%">
	  <h1><small> 	Auditorio </small> Matute Remus</h1>
	</div>

<div class="flex-container" >
	<div>
		<div>
			<h3 style="color: #3bd65f; font-weight: bold" >Descripcion</h3>
			<p>Aqui encontraras informacion sobre el calendario de los eventos realizados en los auditorios de CUCEI, asi como las caracteristicas y la posibilidad de solicitar uno de estos espacios cuando lo necesites con 15 dias de anticipacion para verificar tu solicitud.</p>
		</div>
<!---------------------------------Galeria de Imagenes--------------------------------->

		<div>
			<div style="justify-content: center">
				<div class="row flex-conteiner" style="padding: 2%">
			    <div class="thumbnail">
			    	<a href="https://igx.4sqi.net/img/general/600x600/5631643_Jg7OIF8bXsLl4y1vbYpJ2yJaxUDxDW1BtFA4dgmU4hU.jpg">
				      <img class="imgAudiGal" src="https://igx.4sqi.net/img/general/600x600/5631643_Jg7OIF8bXsLl4y1vbYpJ2yJaxUDxDW1BtFA4dgmU4hU.jpg">
				      <div class="caption">
				        <h6>Escenario Externo</h6>
				      </div>
				    </a>
			    </div>
			    <div class="thumbnail">
		    		<a href="http://www.cucei.udg.mx/sites/default/files/styles/noticia/public/galeria_imagenes/img_8843.jpg?itok=YzvHfs-E">
		     	 	<img class="imgAudiGal" src="http://www.cucei.udg.mx/sites/default/files/styles/noticia/public/galeria_imagenes/img_8843.jpg?itok=YzvHfs-E">
		      		<div class="caption">
		        		<h6>Escenario Interno</h6>
		      		</div>
		      		</a>
		    	</div>
		    	<div class="thumbnail">
			   	  <a href="http://static.panoramio.com/photos/original/12041861.jpg">
				      <img class="imgAudiGal" src="http://static.panoramio.com/photos/original/12041861.jpg" href="http://static.panoramio.com/photos/original/12041861.jpg">
				      <div class="caption">
				        <h6>GradasExterior</h6>
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
		  				Cañon
		    			<span class="badge badge-primary badge-pill">1</span>
		  			</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
						Pantallas
						<span class="badge badge-primary badge-pill">0</span>
					</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
		   			    Asientos
		    	    	<span class="badge badge-primary badge-pill">250</span>
		            </li>
				</ul>
			</div>
			<div>
				<ul class="list-group">
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
		  				Cañon
		    			<span class="badge badge-primary badge-pill">1</span>
		  			</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
						Pantallas
						<span class="badge badge-primary badge-pill">0</span>
					</li>
		  			<li class="list-group-item d-flex justify-content-between align-items-center">
		   			    Asientos
		    	    	<span class="badge badge-primary badge-pill">250</span>
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
