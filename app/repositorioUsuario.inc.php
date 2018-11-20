<?php

class RepositorioUsuario {
    public static function tuGfa() {
        return "this-gef";
    }
    public static function insertarUsuario($conexion, $usuario) {
        $usuario_insertado = false;

        if(isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios(nombre, email, pass, fecha_registro, activo) VALUES(:nombre, )";

                $sentencia = $conexion->prepare($sql);
                $usuario_nombre =  $usuario->getNombre();
                $usuario_email =  $usuario->getEmail();
                $usuario_pass =  $usuario->getPass();
                $sentencia->bindParam(':nombre', $usuario_nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $usuario_email, PDO::PARAM_STR);
                $sentencia->bindParam(':pass', $usuario_pass, PDO::PARAM_STR);
                $usuario_insertado = $sentencia->execute();

            } catch (PDOException $ex) {
                print("ERROR: ".$ex->getMessage());
            }
        }
        return $usuario_insertado;
    }

    public static function obtenerUsuarioPorCodigo($conexion, $userId) {
        $usuario = null;
        if(isset($conexion)) {
            try {
                include_once 'usuario.php';

                $sql = "SELECT * FROM usuario WHERE idUsuario=:userId;";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':userId', $userId, PDO::PARAM_INT);
                $sentencia->execute();
                $resultado =  $sentencia->fetch();
                if(!empty($resultado)) {
                    var_dump($resultado);
                    $usuario = new Usuario($resultado['idUsuario'],
                                            $resultado['nombreUsuario'],
                                            $resultado['contrasenaUsuario'],
                                            $resultado['idPuestoUsario']);
                }
            } catch (PDOException $ex) {
                print 'ERROR'.$ex->getMessage();
            }
        }
        return $usuario;
    }
}
?>
