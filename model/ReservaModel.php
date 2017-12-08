<?php

include_once 'Database.php';
include_once 'medico.php';
include_once 'paciente.php';
include_once 'reservacion.php';

//include_once 'servicios.php';

class ReservaModel {

    public function getReservaciones() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from reservacion order by id_reservacion";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listadoReserva = array();
        foreach ($resultado as $res) {
            $reservacion = new reservacion($res['nombre_paciente'], $res['id_medico'], $res['id_reservacion'], $res['descripcion'], $res['nota'], $res['fecha_cita'], $res['hora_cita'], $res['fecha_creacion']);
            array_push($listadoReserva, $reservacion);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listadoReserva;
    }

    public function getReserva($id_reservacion) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from reservacion where id_reservacion=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_reservacion));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $reservacion = new reservacion($res['nombre_paciente'], $res['id_medico'], $res['id_reservacion'], $res['descripcion'], $res['nota'], $res['fecha_cita'], $res['hora_cita'], $res['fecha_creacion']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $reservacion;
    }

    //insertar reserva

    public function insertarReserva($nombre_paciente, $id_medico, $descripcion, $nota, $fecha_cita, $hora_cita,$fecha_creacion) {
        $pdo = Database::connect();
        $sql = "insert into reservacion(nombre_paciente, id_medico, descripcion, nota, fecha_cita, hora_cita,fecha_creacion) values(?,?,?,?,?,?,?)";
        
        $consulta = $pdo->prepare($sql);
        
        //Ejecutamos y pasamos los parametros:
        try {
          $consulta->execute(array($nombre_paciente, $id_medico, $descripcion, $nota, $fecha_cita, $hora_cita,$fecha_creacion));
          
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

   public function actualizarReserva($nombre_paciente,$id_medico,$id_reservacion,$descripcion,$nota,
           $fecha_cita,$hora_cita,$fecha_creacion){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update reservacion set nombre_paciente=?,id_medico=?,descripcion=?,nota=?,fecha_cita=?,hora_cita=?,fecha_creacion=? where id_reservacion=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
        $consulta->execute(array($id_medico,$id_reservacion,$descripcion,$nota,$fecha_cita,$hora_cita,$fecha_creacion,$nombre_paciente));
         } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
        public function eliminarReserva($id_reservacion) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from reservacion where id_reservacion=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:

        try {
            $consulta->execute(array($id_reservacion));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
}
