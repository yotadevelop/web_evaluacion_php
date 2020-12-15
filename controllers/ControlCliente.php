<?php

namespace controllers;

class ControlCliente{
    public $bt_crear;
    public $bt_buscar;
    public $bt_ingresar;

    public function __construct()
    {
        $this->bt_crear  = $_POST['bt_crear'];
        $this->bt_buscar = $_POST['bt_buscar'];
        $this->bt_ingresar = $_POST['bt_ingresar'];
    }

    public function loadForm(){
        session_start();
        if(isset($this->bt_crear)){
            unset($_SESSION['buscar']);
            unset($_SESSION['ingresar']);
            $_SESSION['crear'] = "ON";
        }else if(isset($this->bt_buscar)){
            unset($_SESSION['crear']);
            unset($_SESSION['ingresar']);
            $_SESSION['buscar'] = "ON";
        }else{
            unset($_SESSION['buscar']);
            unset($_SESSION['crear']);
            $_SESSION['ingresar'] = "ON";
        }
        header("Location: ../views/indexVend.php");
    }
}
$obj = new ControlCliente();
$obj->loadForm();