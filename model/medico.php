<?php


class medico {
    private $id_categoria;
    private $id_medico;
    private $nombre_medico;
    private $apellido_medico;
    private $email;
    private $telefono;
    
    function __construct($id_categoria, $id_medico, $nombre_medico, $apellido_medico, $email, $telefono) {
        $this->id_categoria = $id_categoria;
        $this->id_medico = $id_medico;
        $this->nombre_medico = $nombre_medico;
        $this->apellido_medico = $apellido_medico;
        $this->email = $email;
        $this->telefono = $telefono;
    }
    function getId_categoria() {
        return $this->id_categoria;
    }

    function getId_medico() {
        return $this->id_medico;
    }

    function getNombre_medico() {
        return $this->nombre_medico;
    }

    function getApellido_medico() {
        return $this->apellido_medico;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setId_medico($id_medico) {
        $this->id_medico = $id_medico;
    }

    function setNombre_medico($nombre_medico) {
        $this->nombre_medico = $nombre_medico;
    }

    function setApellido_medico($apellido_medico) {
        $this->apellido_medico = $apellido_medico;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }



}
