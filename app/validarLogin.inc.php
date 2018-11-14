<?php

include_once 'app/repositorioUsuario.inc.php';

class ValidadorLogin {
    private $usuario;
    private $error;

    function __construct($userId, $clave, $conexion)
    {
        $this->error = "";
        if(!$this->variableIniciada($userId) || !$this->variableIniciada($clave)) {
            $this->usuario = null;
            $this->error = "Debes introducir tu codigo y pass.";
        } else {
            echo "valid";
            echo RepositorioUsuario::tuGfa();
            //$this->usuario = RepositorioUsuario::obtenerUsuarioPorCodigo($conexion, $userId);
            if(is_null($this->usuario) || !password_verify($clave, $this->usuario->getPass())) {
                $this->error = "Datos incorrectos.";
            } else {
                echo "correcto";
            }
        }
    }

    private function variableIniciada($variable) {
        return (isset($variable) && !empty($variable));
    }

    public function obtenerUsuario() {
        return $this->usuario;
    }
    public function obtenerError() {
        return $this->error;
    }
    public function mostrarError() {
        if($this->error !== '') {
            echo "</br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div></br>";
        }
    }
}


?>
