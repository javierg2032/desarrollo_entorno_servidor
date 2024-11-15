<?php
class Usuarios
{
    public $nombreUsuario;
    public $contrasena;

    // Constructor
    public function __construct($nombreUsuario, $contrasena)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasena = $contrasena;
    }
}
