<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/CrudModel.php';
require_once '../model/ReservaModel.php';
session_start();
//instanciamos los objetos de negocio:
$crudModel = new CrudModel();
$reservaModel = new ReservaModel();
//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];
$mensajeError = "";
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensajeError']);
switch ($opcion) {
    //PACIENTES
    case "listar_pacientes":
        //obtenemos la lista:
        $listadoPacientes = $crudModel->getPacientes();
        //y los guardamos en sesion:
        $_SESSION['listadoPacientes'] = serialize($listadoPacientes);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/pacientes.php');
        break;

    case "crear_paciente":
        //obtenemos los parametros del formulario:
        $cedula = $_REQUEST['cedula'];
        $nombre_paciente = $_REQUEST['nombre_paciente'];
        $apellido_paciente = $_REQUEST['apellido_paciente'];
        $email = $_REQUEST['email'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        //creamos el nuevo registro:
        $crudModel->insertarPaciente($cedula, $nombre_paciente, $apellido_paciente, $email, $direccion, $telefono);
        //actualizamos el listado:
        $listadoPacientes = $crudModel->getPacientes();
        //y los guardamos en sesion:
        $_SESSION['listadoPacientes'] = serialize($listadoPacientes);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/pacientes.php');
        break;

    case "editar":
        //obtenemos los parametros del formulario:
        $cedula = $_REQUEST['cedula'];
        //Buscamos los datos
        $paciente = $crudModel->getPaciente($cedula);
        //guardamos en sesion para edicion posterior:
        $_SESSION['paciente'] = serialize($paciente);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editar.php');
        break;
    case "actualizar":
        //obtenemos los parametros del formulario:
        $cedula = $_REQUEST['cedula'];
        $nombre_paciente = $_REQUEST['nombre_paciente'];
        $apellido_paciente = $_REQUEST['apellido_paciente'];
        $email = $_REQUEST['email'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        //actualizamos la factura:
        $crudModel->actualizarPaciente($cedula, $nombre_paciente, $apellido_paciente, $email, $direccion, $telefono);
        //actualizamos lista de facturas:
        $listadoPacientes = $crudModel->getPacientes();
        $_SESSION['listadoPacientes'] = serialize($listadoPacientes);
        header('Location: ../view/pacientes.php');
        break;

    case "eliminar_paciente":
        //obtenemos el codigo del producto a eliminar:
        $cedula = $_REQUEST['cedula'];
        //eliminamos el producto:
        $crudModel->eliminarPaciente($cedula);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoPacientes = $crudModel->getPacientes();
        $_SESSION['listadoPacientes'] = serialize($listadoPacientes);
        header('Location: ../view/pacientes.php');
        break;

    ////MEDICOS/////
    ///////////////
    case "listar_medicos":
        //obtenemos la lista:
        $listado = $crudModel->getMedicos();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/medicoss.php');
        break;
    //crear nuevo medico
    case "crear_medico":
        //obtenemos los parametros del formulario:
        $id_categoria = $_REQUEST['id_categoria'];
        $nombre_medico = $_REQUEST['nombre_medico'];
        $apellido_medico = $_REQUEST['apellido_medico'];
        $email = $_REQUEST['email'];
        $telefono = $_REQUEST['telefono'];
        //creamos el nuevo registro:
        $r = $crudModel->insertarMedico($id_categoria, $nombre_medico, $apellido_medico, $email, $telefono);

        //actualizamos el listado:
        $listado = $crudModel->getMedicos();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/medicoss.php');
        break;
    case "editar_medico":
        //obtenemos los parametros del formulario:
//        $id_categoria=$_REQUEST['id_categoria'];
        $id_medico = $_REQUEST['id_medico'];
        //Buscamos los datos
        $medico = $crudModel->getMedico($id_medico);
        //guardamos en sesion para edicion posterior:
        $_SESSION['medico'] = serialize($medico);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editarMedico.php');
        break;
    case "actualizar_medico":
        //obtenemos los parametros del formulario:
        $id_categoria = $_REQUEST['id_categoria'];
        $id_medico = $_REQUEST['id_medico'];
        $nombre_medico = $_REQUEST['nombre_medico'];
        $apellido_medico = $_REQUEST['apellido_medico'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        //actualizamos la factura:
        $crudModel->actualizarMedico($nombre_medico, $apellido_medico, $email, $telefono, $id_medico);
        //actualizamos lista de facturas:
        $listado = $crudModel->getMedicos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/medicoss.php');
        break;

    case "eliminar_medico":
        //obtenemos el codigo del producto a eliminar:
        $id_medico = $_REQUEST['id_medico'];
        //eliminamos el producto:
        $crudModel->eliminarMedico($id_medico);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $crudModel->getMedicos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/medicoss.php');
        break;

    //CATEGORIA///
    case "listar_categoria":
        //obtenemos la lista:
        $listarCategoria = $crudModel->getCategorias();
        //y los guardamos en sesion:
        $_SESSION['listarCategoria'] = serialize($listarCategoria);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/categorias.php');
        break;

    case "crear_categoria":
        //obtenemos los parametros del formulario:
//        $id_categoria=$_REQUEST['id_categoria'];
        $nombre_categoria = $_REQUEST['nombre_categoria'];

        //creamos el nuevo registro:
        $crudModel->insertarCategoria($id_categoria, $nombre_categoria);
        //actualizamos el listado:
        $listarCategoria = $crudModel->getCategorias();
        //y los guardamos en sesion:
        $_SESSION['listarCategoria'] = serialize($listarCategoria);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/categorias.php');
        break;

    ///////////////////////////
    //////////////////////////
    /////////RESERVACIONES/////////
    ////////////////////////
    //////////////////////////
    case "listar_reserva":
        //obtenemos la lista:
        $listadoReserva = $reservaModel->getReservaciones();
        //y los guardamos en sesion:
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/reservas.php');
        break;


    case "crear_reserva":
        //obtenemos los parametros del formulario:
        $nombre_paciente = $_REQUEST['nombre_paciente'];
        $id_medico = $_REQUEST['id_medico'];
        $descripcion = $_REQUEST['descripcion'];
        $nota = $_REQUEST['nota'];
        $fecha_cita = $_REQUEST['fecha_cita'];
        $hora_cita = $_REQUEST['hora_cita'];
        $fecha_creacion = $_REQUEST['fecha_creacion'];
        //creamos el nuevo registro:
        $reservaModel->insertarReserva($nombre_paciente, $id_medico, $descripcion, $nota, $fecha_cita, $hora_cita, $fecha_creacion);
//actualizamos el listado:
        $listadoReserva = $reservaModel->getReservaciones();
        //y los guardamos en sesion:
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/reservas.php');
        break;

    case "editar_reservacion":
        //obtenemos los parametros del formulario:
        $id_reservacion = $_REQUEST['id_reservacion'];
        //Buscamos los datos
        $reservacion = $reservaModel->getReserva($id_reservacion);
        //guardamos en sesion para edicion posterior:
        $_SESSION['reservacion'] = serialize($reservacion);
        //redirigimos la navegación al formulario de edicion:
        header('Location: ../view/editarReserva.php');
        break;
    

    case "actualizar_reservacion":
        //obtenemos los parametros del formulario:
        $nombre_paciente = $_REQUEST['nombre_paciente'];
        $id_medico = $_REQUEST['id_medico'];
        $id_reservacion= $_REQUEST['id_reservacion'];
        $descripcion = $_REQUEST['descripcion'];
        $nota = $_REQUEST['nota'];
        $fecha_cita = $_REQUEST['fecha_cita'];
        $hora_cita = $_REQUEST['hora_cita'];
        $fecha_creacion = $_REQUEST['fecha_creacion'];
        //actualizamos la factura:
        $reservaModel->actualizarReserva($nombre_paciente, $id_medico, $id_reservacion, $descripcion, $nota, $fecha_cita, $hora_cita, $fecha_creacion);
        //actualizamos lista de facturas:
        $listadoReserva = $reservaModel->getReservaciones();
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        
        header('Location: ../view/reservas.php');
        break;

     case "eliminar_reservacion":
        //obtenemos el codigo del producto a eliminar:
        $id_reservacion = $_REQUEST['id_reservacion'];
        //eliminamos el producto:
        $reservaModel->eliminarReserva($id_reservacion);
        //actualizamos la lista de productos para grabar en sesion:
        $listadoReserva = $reservaModel->getReservaciones();
        $_SESSION['listadoReserva'] = serialize($listadoReserva);
        header('Location: ../view/reservas.php');
        break;


    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}

