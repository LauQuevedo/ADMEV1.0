<?php
include_once '../../app/conexion.inc.php';
include_once '../../app/validarEvento.inc.php';
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
    $sql = "SELECT * FROM ";
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
<!-- -------------------Formulario------------------------->
    <div>
        <form rol="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <?php
                if(isset($_POST['enviar'])) {
                    include_once 'registroValidado.php';
                } else {
                    include_once 'registroVacio.php';
                }
            ?>
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
