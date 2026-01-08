<?php
    require_once __DIR__ .'/../modelo/conexion.php';
    class Mminijuego extends Conexion{
        //metodo para obtener los minijuegos
        public function obtenerMinijuegos(){
            //preparar consulta
            $sql="SELECT * FROM minijuegos";
            try{
                $stmt=$this->conexion->prepare($sql);
                $stmt->execute();
                $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
                if($resultado){
                    return $resultado;
                }else{
                    return "No tenemos minijuegos disponibles en este momento.";
                }
            }catch(PDOException $e){
                return "Hubo un fallo interno: " . $e->getMessage();
            }
        }
        //metodo para obtener un minijuego expecífico
        public function obtenerMinijuegoEspecifico($idMini){
            //preparar consulta
            $sql="SELECT * FROM minijuegos WHERE idMinijuego=:idMini";
            try{
                $stmt=$this->conexion->prepare($sql);
                $stmt->bindParam(':idMini', $idMini, PDO::PARAM_INT);
                $stmt->execute();
                $resultado=$stmt->fetch(PDO::FETCH_ASSOC);
                if($resultado){
                    return $resultado;
                }else{
                    return "El minijuego solicitado no existe.";
                }
            }catch(PDOException $e){
                return "Hubo un fallo interno: " . $e->getMessage();
            }
        }
    }
?>