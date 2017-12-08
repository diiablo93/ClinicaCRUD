<!DOCTYPE html>
<?php
session_start();
include_once '../model/medico.php';

include_once '../model/CrudModel.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizacion de Medicos</title>
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
        $medico = unserialize($_SESSION['medico']);

        ?>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar_medico">
            <table>
                <tr>
                    <td>ID MEDICO</td>
                    <td>
                        <?php echo $medico->getId_medico(); ?>
                        <input  type="hidden" name="id_medico" value="<?php echo $medico->getId_medico(); ?>"/>

                    </td>
                </tr>
                 <tr>
                    <td>CATEGORIA</td>
                    <td>
                        <input value="<?php echo $medico->getId_categoria(); ?>" type="text" name="id_categoria" size="50" maxlength="50" required="true">
                       
                       
                    </td>
                </tr>

                <tr>
                    <td>NOMBRE</td>
                    <td>
                        <input value="<?php echo $medico->getNombre_medico(); ?>" type="text" name="nombre_medico" size="50" maxlength="50" required="true">


                    </td>
                </tr>
                <tr>
                    <td>APELLIDO</td>
                    <td>
                        <input value="<?php echo $medico->getApellido_medico(); ?>" type="text" name="apellido_medico" size="50" maxlength="50" required="true">

                    </td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><input value="<?php echo $medico->getEmail(); ?>" type="text" name="email" size="50" maxlength="50" required="true"></td>
                </tr>

                <tr>
                    <td>TELEFONO</td>
                    <td><input value="<?php echo $medico->getTelefono(); ?>" type="text" name="telefono" size="10" maxlength="15" required="true"></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Actualizar Medico" class="btn btn-info"></td>
                    
                </tr>
            </table>
        </form>
    </body>
</html>

