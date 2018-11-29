<?php

class ValidadorEvento {
    private $avisoInicio;
    private $avisoCierra;
    private $nombreS;
    private $apellidoS;
    private $codigoS;

    private $nombreR;
    private $apellidoR;
    private $codigoR;

    private $errorNombreRes;
    private $errorApellidoR;
    private $errorCodigoRes;

    private $errorNombreSol;
    private $errorApellidoS;
    private $errorCodigoSol;

    public function __construct($nombreS, $nombreR, $apellidoS, $apellidoR, $codigoS, $codigoR, $conexion) {
        $this->$avisoInicio = "<br><div class='alert alert-danger role=alert'>";
        $this->$avisoCierra = "</div>";
        $nombreS = "";
        $apellidoS = "";
        $codigoS = "";
        $nombreR = "";
        $apellidoR = "";
        $codigoR = "";

        $errorNombreRes = validarNombreRes($conexion, $nombreR);
        $errorApellidoR = validarApellidoRes($conexion, $apellidoR);
        $errorCodigoRes = validarCodigoRes($conexion, $codigoR);

        $errorNombreSol = validarNombreS($conexion, $nombreS);
        $errorApellidoS = validarApellidoS($conexion, $apellidoS);
        $errorCodigoSol = validarCodigoS($conexion, $codigoS);
        if($this->$errorNombreRes === "" && $this->$errorNombreSol === ""
            && $this->$errorApellidoR === "" && $this->$errorApellidoS === ""
            && $this->$errorCodigoRes === "" && $this->$errorCodigoSol === "") {

        }

    }

    private function variableInicializada($var) {
        return (isset($var) && !empty($var));
    }

    private function validarNombreRes($conexion, $nombreR) {
        if(!$this->variableInicializada($nombreR)) {
            return "Debes escribir un nombre del responsable.";
        } else {
            $this->nombreR = $nombreR;
        }
        if(strlen($nombreR) <= 3) {
            return "El nombre debe ser mas largo de 2 caracteres.";
        }
        if(strlen($nombreR) > 50) {
            return "El nombre debe ser menor a 50 caracteres";
        }
        return "";
    }

    private function validarApellidoRes($conexion, $apellidoR) {
        if(!$this->variableInicializada($apellidoR)) {
            return "Debes escribir un apellido del responsable.";
        } else {
            $this->$apellidoR = $apellidoR;
        }
        if(strlen($apellidoR) <= 7) {
            return "El apellido debe ser mas largo de 6 caracteres.";
        }
        if(strlen($apellidoR) > 50) {
            return "El apellido debe ser menor a 50 caracteres";
        }
        return "";
    }
    private function validarCodigoRes($conexion, $codigoR) {
        if(!$this->variableInicializada($codigoR)) {
            return "Debes escribir un codigo del responsable.";
        } else {
            $this->$codigoR = $codigoR;
        }
        if(strlen($codigoR) <= 4) {
            return "El codigo debe ser mas largo de 4 caracteres.";
        }
        if(strlen($codigoR) > 11) {
            return "El codigo debe ser menor a 11 caracteres";
        }
        return "";
    }
    private function validarNombres($conexion, $nombreS) {
        if(!$this->variableInicializada($nombreS)) {
            return "Debes escribir un nombre del responsable.";
        } else {
            $this->nombreS = $nombreS;
        }
        if(strlen($nombreS) <= 3) {
            return "El nombre debe ser mas largo de 2 caracteres.";
        }
        if(strlen($nombreS) > 50) {
            return "El nombre debe ser menor a 50 caracteres";
        }
        return "";
    }

    private function validarApellidoS($conexion, $apellidoS) {
        if(!$this->variableInicializada($apellidoS)) {
            return "Debes escribir un apellido del responsable.";
        } else {
            $this->$apellidoS = $apellidoS;
        }
        if(strlen($apellidoS) <= 7) {
            return "El apellido debe ser mas largo de 6 caracteres.";
        }
        if(strlen($apellidoS) > 50) {
            return "El apellido debe ser menor a 50 caracteres";
        }
        return "";
    }
    private function validarCodigoRes($conexion, $codigoS) {
        if(!$this->variableInicializada($codigoS)) {
            return "Debes escribir un codigo del responsable.";
        } else {
            $this->$codigoS = $codigoS;
        }
        if(strlen($codigoS) <= 4) {
            return "El codigo debe ser mas largo de 4 caracteres.";
        }
        if(strlen($codigoS) > 11) {
            return "El codigo debe ser menor a 11 caracteres";
        }
        return "";
    }
    private function getNombreR() {
        return $this->$nombreR;
    }
    private function getApellidoR() {
        return $this->$apellidoR;
    }
    private function getCodigoR() {
        return $this->$codigoR;
    }
    private function getNombreS() {
        return $this->$nombreS;
    }
    private function getApellidoS() {
        return $this->$apellidoS;
    }
    private function getCodigoS() {
        return $this->$codigoS;
    }
    private function getErrorNombreR() {
        return $this->$errorNombreRes;
    }
    private function getErrorApellidoR() {
        return $this->$errorApellidoR;
    }
    private function getErrorCodigoR() {
        return $this->$errorCodigoRes;
    }
    private function getErrorNombreS() {
        return $this->$errorNombreSol;
    }
    private function getErrorApellidoS() {
        return $this->$errorApellidoS;
    }
    private function getErrorCodigoS() {
        return $this->$errorCodigoSol;
    }
}
?>
