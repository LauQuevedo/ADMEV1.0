<?php

class RepositorioUsuario {

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
                include_once 'app/usuario.php';

                $sql = "SELECT * FROM usuarios WHERE $userId=:userId;";
                $sentencia = $conexion->prepare($sql);
                //$sentencia->bindParam(':email', userId, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado =  $sentencia->fetch();
                if(!empty($resultado)) {
                    $usuario = new Usuario($resultado['id'],
                                            $resultado['nombre'],
                                            $resultado['pass'],
                                            $resultado['puesto']);
                }
            } catch (PDOException $ex) {
                print 'ERROR'.$ex->getMessage();
            }
        }
        return $usuario;
    }
}
?>
