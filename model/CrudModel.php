<?php

include_once 'Database.php';
include_once 'medico.php';
include_once 'paciente.php';

include_once 'categoria.php';
class CrudModel {
    //////////////////////////
    //PACIENTES:
    //////////////////////////
    
    public function getPacientes() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from paciente order by cedula";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listadoPacientes = array();
        foreach ($resultado as $res) {
            $paciente = new paciente($res['cedula'], $res['nombre_paciente'], $res['apellido_paciente'], $res['email'], $res['direccion'], $res['telefono']);
          
           
            array_push($listadoPacientes,$paciente);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listadoPacientes;
    }
    public function getPaciente($cedula) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from paciente where cedula=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        //obtenemos el registro especifico:
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $paciente=new paciente($res['cedula'], $res['nombre_paciente'], $res['apellido_paciente'], $res['email'], $res['direccion'], $res['telefono']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $paciente;
    }
    //insertar paciente
    
    public function insertarPaciente($cedula,$nombre_paciente,$apellido_paciente,$email,$direccion,$telefono) {
        $pdo = Database::connect();
        $sql = "insert into paciente(cedula,nombre_paciente,apellido_paciente,email,direccion,telefono) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($cedula,$nombre_paciente,$apellido_paciente,$email,$direccion,$telefono));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    //eliminar paciente
//      
       public function eliminarPaciente($cedula) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from paciente where cedula=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:

        try {
            $consulta->execute(array($cedula));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    //actualizar paciente
    
    public function actualizarPaciente($cedula,$nombre_paciente,$apellido_paciente,$email,$direccion,$telefono){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update paciente set nombre_paciente=?,apellido_paciente=?,email=?,direccion=?,telefono=? where cedula=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
        $consulta->execute(array($nombre_paciente,$apellido_paciente,$email,$direccion,$telefono,$cedula));
         } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    
     //////////////////////////
    //Medicos
    //////////////////////////
    
   public function getMedicos() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from medico order by id_medico";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $medico = new medico($res['id_categoria'], $res['id_medico'], $res['nombre_medico'], $res['apellido_medico'], $res['email'], $res['telefono']);
          
           
            array_push($listado,$medico);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    public function getMedico($id_medico) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from medico where id_medico=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_medico));
        //obtenemos el registro especifico:
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $medico=new medico($res['id_categoria'], $res['id_medico'], $res['nombre_medico'], $res['apellido_medico'], $res['email'], $res['telefono']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $medico;
    }
    //insertar medico
    
    public function insertarMedico($id_categoria,$nombre_medico,$apellido_medico,$email,$telefono) {
        $pdo = Database::connect();
        $sql = "insert into medico(id_categoria,nombre_medico,apellido_medico,email,telefono) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        
        //Ejecutamos y pasamos los parametros:
        try {
            $r=$consulta->execute(array($id_categoria,$nombre_medico,$apellido_medico,$email,$telefono));
           
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    //eliminar medico
//      
      public function eliminarMedico($id_medico) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from medico where id_medico=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:

        try {
            $consulta->execute(array($id_medico));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    //actualizar medico
    
   public function actualizarMedico($id_categoria,$id_medico,$nombre_medico,$apellido_medico,$email,$telefono){
        //Preparamos la conexión a la bdd:
        $pdo=Database::connect();
        $sql="update medico set id_categoria=?,nombre_medico=?,apellido_medico=?,email=?,telefono=? where id_medico=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
        $consulta->execute(array($id_categoria,$nombre_medico,$apellido_medico,$email,$telefono,$id_medico));
         } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
//////////////////////////7
 /////CATEGORIA////////////
    ////////////////////
    
    public function getCategorias() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from categoria order by id_categoria";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $categoria =new categoria($res['id_categoria'],$res['nombre_categoria']);
          
           
            array_push($listado,$categoria);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    public function getCategoria($id_categoria) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from categoria where id_categoria=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_categoria));
        //obtenemos el registro especifico:
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $categoria=new categoria($res['id_categoria'],$res['nombre_categoria']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $categoria;
    }
    //insertar nueva categoria
    
    public function insertarCategoria($id_categoria,$nombre_categoria) {
        $pdo = Database::connect();
        $sql = "insert into categoria(id_categoria,nombre_categoria) values(?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id_categoria,$nombre_categoria));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    
}
