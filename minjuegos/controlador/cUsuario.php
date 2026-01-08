<?php
    require_once __DIR__ . "/../modelo/mUsuario.php"; 

    class Cusuario {
        private $modeloUsuario;
        public $vista;
        public $mensaje;

        public function __construct() {
            $this->modeloUsuario = new Musuario();
            $this->vista = '';
            $this->mensaje = null;
        }

        //metodo para mostrar la vista de login
        public function login() {
            $this->vista = 'inicioSesion.html';
            return;
        }

        //metodo para verificar el inicio de sesion
        public function verificarInicioSesion(){
            if(empty($_POST['correo']) || empty($_POST['contrasena'])){
                $this->mensaje = "Por favor, complete todos los campos.";
                $this->vista = 'error.php';
                return;
            }
            $resultado=$this->modeloUsuario->validarUsuario();
            if($resultado === true){
                header("Location: index.php?controlador=minijuego&metodo=obtenerMinijuegos");
            } else {
                $this->mensaje=$resultado;
                $this->vista = 'error.php';
            }
        }

        //metodo para cerrar sesion
        public function cerrarSesion(){
            session_start();//inicio sesion
            session_unset();//elimino variables de sesion
            session_destroy();//y destruyo la sesion
            //Redirecciono al login
            header("Location: index.php?controlador=usuario&metodo=login");
        }
    }
?>