<!DOCTYPE html>
<?php
session_start();
include_once '../model/paciente.php';

include_once '../model/CrudModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Pacientes</title>
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
        $paciente = unserialize($_SESSION['paciente']);
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar">
            <img src="images/banner-general.jpg">
            <table>
                <tr>
                    <td>Cedula</td>
                    <td>
                        <?php echo $paciente->getCedula(); ?>
                        <input  type="hidden" name="cedula" value="<?php echo $paciente->getCedula(); ?>"/>

                    </td>
                </tr>

                <tr>
                    <td>NOMBRE</td>
                    <td>
                        <input value="<?php echo $paciente->getNombre_paciente(); ?>" type="text" name="nombre_paciente" size="50" maxlength="50" required="true">


                    </td>
                </tr>
                <tr>
                    <td>APELLIDO</td>
                    <td>
                        <input value="<?php echo $paciente->getApellido_paciente(); ?>" type="text" name="apellido_paciente" size="50" maxlength="50" required="true">

                    </td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><input value="<?php echo $paciente->getEmail(); ?>" type="text" name="email" size="50" maxlength="50" required="true"></td>
                </tr>
                <tr>
                    <td>DIRECCION</td>
                    <td><input value="<?php echo $paciente->getDireccion(); ?>" type="text" name="direccion" size="50" maxlength="50" required="true"></td>
                </tr>
                <tr>
                    <td>TELEFONO</td>
                    <td><input value="<?php echo $paciente->getTelefono(); ?>" type="text" name="telefono" size="10" maxlength="15" required="true"></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Actualizar Paciente" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

