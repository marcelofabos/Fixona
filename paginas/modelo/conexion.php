<?php

class Conexion{
    private $usuario = "root";
    private $password = "";
    private $servidor = "localhost";
    private $base = "libreria";

    public function Conectar(){
        try{
            $cnx = new PDO("mysql:host=$this->servidor; dbname=$this->base;",
                            $this->usuario, $this->password);
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //retornar la conexion
            
            return $cnx;
        }catch(\Throwable $th){
            echo "Paso un error: ".$th->getMessage();
        }
    }
}