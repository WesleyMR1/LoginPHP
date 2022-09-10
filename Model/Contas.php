<?php

class Contas{

    private $usuario;
    private $senha;

    public function __construct($usuario, $senha)
    {   
        $this->usuario = $usuario;
        $this->senha = $senha;
    }


    public function get_usuario()
    {
        return $this->usuario;
    }
    public function set_usuario($parametro){
        $this->usuario = $parametro;
    }
    public function get_senha()
    {
        return $this->senha;
    }
    public function set_senha($parametro){
        $this->senha = $parametro;
    }

}


?>