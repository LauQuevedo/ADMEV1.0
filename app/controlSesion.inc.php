<?php

class ControlSesion {
    public static function iniciar_sesion($id, $nombre) {
        if(session_id() === '') {
            session_start();
        }
        $_SESSION['id_usuario'] = $id;
        $_SESSION['nombre'] = $nombre;
    }

    public static function cerrar_sesion() {
        if(session_id() == '') {
            session_start();
        }

        if(isset($_SESSION['id_usuario'])) {
            unset($_SESSION['id_usuario']);
        }

        if(isset($_SESSION['nombre'])) {
            unset($_SESSION['nombre']);
        }
    }

    public static function sesion_iniciada() {
        if(session_id() == '') {
            session_start();
        }

        return isset($_SESSION['nombre']) && isset($_SESSION['id_usuario']);
    }
}
?>
