<!DOCTYPE html>
<?php
include '../model/CrudModel.php';
include '../model/ReservaModel.php';

require_once '../model/medico.php';
require_once '../model/paciente.php';


session_start();
$crudModel = new CrudModel();
$reservaModel = new ReservaModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Reservaciones</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <style>
            body {
                background-color:#E6E6FA;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="images/banner.jpg">
            <div class="row">
                <h3>Reservaciones</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>

            <p>
            <table  width="100%"  border="0" cellspacing="0" cellpadding="0"> 
                <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_reserva">


                    <tr>
                        <td>SELECCIONE AL PACIENTE:</td>
                        <td><select name="nombre_paciente">
                                <?php
                                $listadoPacientes = $crudModel->getPacientes();
                                print_r($listadoPacientes);
                                foreach ($listadoPacientes as $paciente) {
                                    echo "<option value='" . $paciente->getNombre_paciente() . "'>" . $paciente->getNombre_paciente() . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>SELECCIONE AL MEDICO:</td>
                        <td><select name="id_medico">
                                <?php
                                $listado = $crudModel->getMedicos();
                                print_r($listado);
                                foreach ($listado as $medico) {
                                    echo "<option value='" . $medico->getNombre_medico() . "'>" . $medico->getNombre_medico() . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td height="40" valign="middle">Descripcion<input type="textarea" name="descripcion" maxlength="50" required="true"></td>
                        <td height="40" valign="middle">Nota:<input type="textarea" name="nota" maxlength="50" required="true"></td>
                        <td height="40" valign="middle">Fecha Cita:<input type="date" name="fecha_cita" maxlength="50" required="true"></td>
                        <td height="40" valign="middle">Hora Cita:<input type="text" name="hora_cita" maxlength="50" required="true"></td>
                        <td height="40" valign="middle">Fecha Creacion:<input type="date" name="fecha_creacion" maxlength="50" required="true"></td>

                        <td><input type="submit" value="Crear">
                    </tr>
                </form>
            </table>
            <table>
                <tr><td><form action="../controller/controller.php">
                            <input type="hidden" name="opcion" value="listar_reserva">
                            <br>
                            <input type="submit" class="btn btn-info" value="Consultar Reservas">
                        </form></td>



                </tr>
            </table>
        </p>
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>PACIENTE</th>
                    <th>MEDICO</th>
                    <th>NUM RESERVA</th>
                    <th>DESCRIPCION</th>
                    <th>NOTA</th>
                    <th>FECHA CITA</th>
                    <th>HORA CITA</th>
                    <th>FECHA CREACION</th>
                     <th>EDITAR</th>
                    <th>ELIMINAR</th>



                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_SESSION['listadoReserva'])) {

                    $listadoReserva = unserialize($_SESSION['listadoReserva']);
//                       

                    foreach ($listadoReserva as $reservacion) {
                        echo "<tr>";
                        echo "<td>" . $reservacion->getNombre_paciente() . "</td>";
                        echo "<td>" . $reservacion->getId_medico() . "</td>";
                        echo "<td>" . $reservacion->getId_reservacion() . "</td>";
                        echo "<td>" . $reservacion->getDescripcion() . "</td>";
                        echo "<td>" . $reservacion->getNota() . "</td>";
                        echo "<td>" . $reservacion->getFecha_cita() . "</td>";
                        echo "<td>" . $reservacion->getHora_cita() . "</td>";
                        echo "<td>" . $reservacion->getFecha_creacion() . "</td>";
                        echo "<td><a href='../controller/controller.php?opcion=editar_reservacion&id_reservacion=" . $reservacion->getId_reservacion() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                       echo "<td><a href='../controller/controller.php?opcion=eliminar_reservacion&id_reservacion=" . $reservacion->getId_reservacion() . "'><span class='glyphicon glyphicon-pencil'> Eliminar </span></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No se han cargado datos.";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>