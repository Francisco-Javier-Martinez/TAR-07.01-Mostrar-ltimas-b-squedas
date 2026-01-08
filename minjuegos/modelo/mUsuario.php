<?php
    require_once __DIR__ .'/../modelo/conexion.php';
    class Musuario extends Conexion{
        //metodo para validar el usuario
        public function validarUsuario(){

            //recoger variables del formu
            $correo= $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            try{
                //preparar consulta
                $sql="SELECT * FROM usuarios WHERE correo=:correo AND contrasena=:contrasena";
                $stmt=$this->conexion->prepare($sql);
                $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
                $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $stmt->execute();
                $resultado=$stmt->fetch(PDO::FETCH_ASSOC);
                //si es correcto voy a guardar en sesion el nombre del usuario
                if($resultado){
                    session_start();
                    $_SESSION['nombre'] = $resultado['nombre'];
                    return true;
                }else{
                    return "Correo o contraseña incorrectos vuelve a intentarlo.";
                }
            }catch(PDOException $e){
                return "Hubo un fallo interno: " . $e->getMessage();
            }

        }
    }
?>