<!DOCTYPE html>
<?php
session_start();
include_once '../model/reservacion.php';

include_once '../model/CrudModel.php';
include_once '../model/ReservaModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Reserva</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
        <style>
            body {
                background-color:	#E6E6FA;
            }
        </style>
    </head>

    <body>

        <?php
        $reservacion = unserialize($_SESSION['reservacion']);
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar_reservacion">
            <img src="images/banner-general.jpg">
            <table>
              

                <tr>
                    <td>NOMBRE PACIENTE</td>
                    <td>
                        <input value="<?php echo $reservacion->getNombre_paciente(); ?>" type="text" name="nombre_paciente" size="50" maxlength="50" required="true">
                    </td>
                </tr>
                <tr>
                    <td>NOMBRE MEDICO</td>
                    <td>
                        <input value="<?php echo $reservacion->getId_medico(); ?>" type="text" name="id_medico" size="50" maxlength="50" required="true">

                    </td>
                </tr>
                  <tr>
                    <td>ID RESERVACION</td>
                    <td>
                        <?php echo $reservacion->getId_reservacion(); ?>
                        <input  type="hidden" name="id_reservacion" value="<?php echo $reservacion->getId_reservacion(); ?>"/>

                    </td>
                </tr>
                <tr>
                    <td>DESCRIPCION</td>
                    <td><input value="<?php echo $reservacion->getDescripcion(); ?>" type="text" name="descripcion" size="50" maxlength="50" required="true"></td>
                </tr>
                <tr>
                    <td>NOTA</td>
                    <td><input value="<?php echo $reservacion->getNota(); ?>" type="text" name="nota" size="50" maxlength="50" required="true"></td>
                </tr>
                <tr>
                    <td>FECHA CITA</td>
                    <td><input value="<?php echo $reservacion->getFecha_cita(); ?>" type="text" name="fecha_cita" size="10" maxlength="15" required="true"></td>
                </tr>
                <tr>
                    <td>HORA CITA</td>
                    <td><input value="<?php echo $reservacion->getHora_cita(); ?>" type="text" name="hora_cita" size="10" maxlength="15" required="true"></td>
                </tr>

                <tr>
                    <td>FECHA CREACION</td>
                    <td><input value="<?php echo $reservacion->getFecha_creacion(); ?>" type="text" name="fecha_creacion" size="10" maxlength="15" required="true"></td>
                </tr>


                <tr>
                    <td><input type="submit" value="Actualizar Reserva" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

