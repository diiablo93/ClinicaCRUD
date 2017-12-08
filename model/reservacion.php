<?php


class reservacion {
    
    private $nombre_paciente;
    private $id_medico;
    private $id_reservacion;
    private $descripcion;
    private $nota;
    private $fecha_cita;
    private $hora_cita;
    private $fecha_creacion;
    
    function __construct( $nombre_paciente, $id_medico, $id_reservacion, $descripcion, $nota, $fecha_cita, $hora_cita, $fecha_creacion) {
      
        $this->nombre_paciente = $nombre_paciente;
        $this->id_medico = $id_medico;
        $this->id_reservacion = $id_reservacion;
        $this->descripcion = $descripcion;
        $this->nota = $nota;
        $this->fecha_cita = $fecha_cita;
        $this->hora_cita = $hora_cita;
        $this->fecha_creacion = $fecha_creacion;
    }

    
    function getNombre_paciente() {
        return $this->nombre_paciente;
    }

    function setNombre_paciente($nombre_paciente) {
        $this->nombre_paciente = $nombre_paciente;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getId_medico() {
        return $this->id_medico;
    }

    function getId_reservacion() {
        return $this->id_reservacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getNota() {
        return $this->nota;
    }

    function getFecha_cita() {
        return $this->fecha_cita;
    }

    function getHora_cita() {
        return $this->hora_cita;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function setId_medico($id_medico) {
        $this->id_medico = $id_medico;
    }

    function setId_reservacion($id_reservacion) {
        $this->id_reservacion = $id_reservacion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    function setFecha_cita($fecha_cita) {
        $this->fecha_cita = $fecha_cita;
    }

    function setHora_cita($hora_cita) {
        $this->hora_cita = $hora_cita;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }


}
