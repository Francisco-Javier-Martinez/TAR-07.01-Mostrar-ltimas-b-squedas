<?php
    require_once __DIR__ . "/../modelo/mMinijuego.php"; 

    class Cminijuego {
        private $modeloMinijuego;
        public $vista;
        public $mensaje;
        
        //constructor 
        public function __construct() {
            $this->modeloMinijuego=new Mminijuego();
            $this->vista='';
            $this->mensaje=null;
        }

        //metodo para obtener los minijuegos
        public function obtenerMinijuegos(){
            $resultado=$this->modeloMinijuego->obtenerMinijuegos();
            if(is_array($resultado)){
                //iniciar sesion para obtener el nombre del usuario
                session_start();
                $this->vista='pantallaInicio.php';
                return $resultado;
            } else {
                $this->mensaje=$resultado;
                $this->vista='pantallaInicio.php';
            }
        }
        //metodo para jugar un minijuego
        public function jugar(){
            //recoger idMini del minijuego
            $idMini=$_GET['idMini'];
            //llamar al modelo para obtener el minijuego específico
            $resultado=$this->modeloMinijuego->obtenerMinijuegoEspecifico($idMini);
            if(is_array($resultado)){
                //nombre de la cookie
                $cookieName=$idMini.'Juego';
                //Filtramos solo las cookies de juegos
                $cookiesJuegos=[];
                foreach ($_COOKIE as $nombre => $valor) {
                    //strpos sirve para buscar una subcadena dentro de una cadena
                    //Si ese juego ya existe, no se añade pero si no existe, se añade
                    if (strpos($nombre, 'Juego')!=false) {
                        $cookiesJuegos[$nombre]=$valor;
                    }
                }
                //Si ya hay 3 juegos y no existe la cookie del juego actual, borramos el más antiguo.
                if (count($cookiesJuegos)>= 3 && !isset($_COOKIE[$cookieName])) {
                    foreach($cookiesJuegos as $nombreABorrar => $valor) {
                        // Borramos solo el primero
                        setcookie($nombreABorrar, "", time() - 3600, "/");
                        break; 
                    }
                }
                //Crear la cookie del juego actual
                //El primer parámetro es el nombre de la cookie
                //El segundo parámetro es el valor de la cookie
                //El tercer parámetro es el tiempo de expiración (en este caso, 1 hora)
                setcookie($cookieName, $resultado['nombre'], time() + 3600, "/");
                session_start();
                $this->vista='jugar.php';
                return $resultado;
            } else {
                $this->mensaje=$resultado;
                $this->vista='error.php';
            }
        }
    }
?>
