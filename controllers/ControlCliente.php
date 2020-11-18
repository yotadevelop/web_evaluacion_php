<?php

namespace controllers;

class ControlCliente{
    public $bt_crear;
    public $bt_buscar;

    public function __construct()
    {
        $this->bt_crear  = $_POST['bt_crear'];
        $this->bt_buscar = $_POST['bt_buscar'];
    }

    public function loadForm(){
        session_start();
        if(isset($this->bt_crear)){
            $_SESSION['crear'] = "ON";
            header("Location: ../views/CrearCliente.php");
        }else{
            unset($_SESSION['crear']);
            $_SESSION['buscar'] = "ON";
        }
    }
}
$obj = new ControlCliente();
$obj->loadForm();