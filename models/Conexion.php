<?php

namespace models;

class Conexion{

    public static $user ="u6uwfmtob836fktf";
    public static $pass ="7nmNstXHrSPsAwhAyz0E";
    public static $URL  ="mysql:host=btk5rclmorvi9h4peupa-mysql.services.clever-cloud.com;dbname=btk5rclmorvi9h4peupa";

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        }catch(\PDOException $e){
            return null;
        }
    }
}