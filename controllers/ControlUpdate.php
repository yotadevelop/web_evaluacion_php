<?php

namespace controller;

require_once("../models/UsuarioModel.php");

use models\UsuarioModel as UsuarioModel;

class ControlUpdate{
    public $rut;
    public $nombre;
    public $estado;
    
    public function __construct()
    {
        $this->rut    = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
        $this->estado = $_POST['estado'];
    }

    public function update_user(){
        session_start();
        if($this->rut =="" || $this->nombre==""){
            $_SESSION['errorEdit'] = "Complete los campos porfavor";
            header("Location: ../views/GestionUsuarios.php");
            return;
        }

        $modelo = new UsuarioModel();
        $count = $modelo->editar($this->nombre, $this->estado,$this->rut);
        
        if($count == 1){
            $_SESSION['resp_edit'] = "Update Congratulation!!";
        }else{
            $_SESSION['resp'] = "Error en la BD!!";
        }

        header("Location: ../views/GestionUsuarios.php");

    }
}
$obj = new ControlUpdate();
$obj->update_user();