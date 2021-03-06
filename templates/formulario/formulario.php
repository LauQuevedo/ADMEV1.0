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
    <title>Admev | Registro</title>
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
                    <a class="nav-link" href="../Formulario/Formulario.html">Solicitud</a>
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
<!-- -------------------Formulario------------------------->
      <div>
        <form>
<!-- -------------------Solicitante 1------------------------->
          <div style="padding: 1%">
          <h6>Datos del solicitante Responsable</h6>
          <hr align="left" size="2" width="80%"> </hr>
          </div>
          <div class="flex-container">
            <div class="form-group flex-container">
              <div>
              <label for="validation01">Nombres</label>
              <input type="text" class="form-control is-valid" id="validation01" placeholder="Nombres" value="" required>
            </div>
            <div>
              <label for="validation01">Apellidos</label>
              <input type="text" class="form-control is-valid" id="validation01" placeholder="Apellidos" value="" required>
            </div>
            <div>
              <label for="validation01">Codigo</label>
              <input type="text" class="form-control is-valid" id="validation01" placeholder="Codigo" value="" required>
            </div>
            <div>
               <label for="validation01">Puesto</label>
               <br>
               <select class="btn btn-default " >
                  <option>Coordinador</option>
                  <option>Profesor</option>
                  <option>Administrativo</option>
              </select>
            </div>
          </div>
        </div>
<!-- -------------------Solicitante 2------------------------->
<div style="padding: 1%">
          <h6 >Datos del Alumno Solicitante</h6>
          <hr align="left" size="2" width="80%"> </hr>
          </div>
          <div class="flex-container">
            <div class="form-group flex-container">
              <div>
              <label for="validation01">Nombres</label>
              <input type="text" class="form-control is-valid" id="validation01" placeholder="Nombres" value="" required>
            </div>
            <div>
              <label for="validation01">Apellidos</label>
              <input type="text" class="form-control is-valid" id="validation01" placeholder="Apellidos" value="" required>
            </div>
            <div>
              <label for="validation01">Codigo</label>
              <input type="text" class="form-control is-valid" id="validation01" placeholder="Codigo" value="" required>
            </div>
            <div>
               <label for="validation01">Carrera</label>
               <br>
               <select class="btn btn-default " >
                  <option>INCO</option>
                  <option>INCE</option>
                  <option>INFO</option>
              </select>
            </div>
          </div>
        </div>

<!-- -------------------Seleccion de Archivo------------------------->
<div style="padding: 1%">
          <h6>Cartas de Validacion de Evento</h6>
          <hr align="left" size="2" width="80%"> </hr>

<div>
<div class="form-group">
<input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
</div>
</div>
</div>
<!-- -------------------Envio y Reinicio de Formulario------------------------->
<div class="form-group">
<button class="btn btn-primary">Submit</button>
<button class="btn btn-default" type="reset">Reset</button>
</div>

    </form>

  </div>

</body>

</html>

<!-- -------------------Muestra el nombre del archivo en seleccion------------------------->
<script>
$("#file-3").fileinput({
showCaption: false,
browseClass: "btn btn-primary btn-lg",
fileType: "any"
});
</script>
