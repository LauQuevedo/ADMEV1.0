<?php

class Usuario {
    private $id;
    private $nombre;
    private $pass;
    private $puesto;

    public function __construct($id, $nombre, $pass, $puesto) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pass = $pass;
        $this->puesto = $puesto;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getPuesto() {
        return $this->puesto;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPassword($password) {
        $this->pass = $password;
    }
}
