<?php

class paciente {
    private $cedula;
    private $nombre_paciente;
    private $apellido_paciente;
    private $email;
    private $direccion;
    private $telefono;
    
    function __construct($cedula, $nombre_paciente, $apellido_paciente, $email, $direccion, $telefono) {
        $this->cedula = $cedula;
        $this->nombre_paciente = $nombre_paciente;
        $this->apellido_paciente = $apellido_paciente;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }
    
   

    function getNombre_paciente() {
        return $this->nombre_paciente;
    }

    function getApellido_paciente() {
        return $this->apellido_paciente;
    }

    function getEmail() {
        return $this->email;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCedula() {
        return $this->cedula;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    
    function setNombre_paciente($nombre_paciente) {
        $this->nombre_paciente = $nombre_paciente;
    }

    function setApellido_paciente($apellido_paciente) {
        $this->apellido_paciente = $apellido_paciente;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }



    
    
}
