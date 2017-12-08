<!DOCTYPE html>
<?php
require_once '../model/paciente.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Pacientes</title>
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
        <div class="container">
            <img src="images/banner.jpg">
            <div class="row">
                <h3>Pacientes</h3>
            </div>
             <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
                
                 <table  width="100%"  border="0" cellspacing="0" cellpadding="0">    
                <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_paciente">
                    <tr>
                    <td>Cédula:</td>
                    <td><input id="ingreso" onkeypress="return justNumbers(event);" required title="cedula" type="text" name="cedula" size="17" maxlength="10"</td>
                    </tr>
                    <tr>
                        <td>Nombres</td>
                        <td><input id="ingreso" required title="Nombres" type="text" pattern="^[a-zA-Z\_\-\.\s]*$" name="nombre_paciente" size="30" maxlength="28"></td>
                    </tr>
                     <tr>
                        <td>Apellidos</td>
                        <td><input id="ingreso" required  title="Apellidos" type="text" pattern="^[a-zA-Z\_\-\.\s]*$" name="apellido_paciente"size="30" maxlength="28"></td>
                    </tr> 
                    <tr>
                        <td>Email</td>
                        <td><input id="ingreso" required title="Email" type="text"  name="email"size="30" maxlength="28"></td>
                    </tr>

                    <tr>
                        <td>Telefono</td>
                        <td><input id="ingreso"  title="Telefono" onkeypress="return justNumbers(event);" type="text" name="telefono" size="10" maxlength="10"></td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td><input id="ingreso" required  title="Direccion" type="text" name="direccion" size="35" maxlength="40"></td>
                    </tr> 
                    
                    <td><input type="submit" value="Crear"></td>
                    </tr>
                </form>
                 </table>
            <table>
            <tr><td><form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="listar_pacientes">
                        <br>
                        <input type="submit" class="btn btn-info" value="Consultar Pacientes">
                    </form></td>



            </tr>
        </table>
            </p>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>CEDULA</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>EMAIL</th>
                        <th>DIRECCION</th>
                        <th>TELEFONO</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
        
        <?php
    
        if (isset($_SESSION['listadoPacientes'])) {
               
                        $listadoPacientes = unserialize($_SESSION['listadoPacientes']);
                        
                      
                        foreach ($listadoPacientes as $paciente) {
                            echo "<tr>";
                            echo "<td>" . $paciente->getCedula() . "</td>";
                            
                            echo "<td>" . $paciente->getNombre_paciente() . "</td>";
                            echo "<td>" . $paciente->getApellido_paciente() . "</td>";
                            echo "<td>" . $paciente->getEmail() . "</td>";
                            echo "<td>" . $paciente->getDireccion() . "</td>";
                            echo "<td>" . $paciente->getTelefono() . "</td>";
                            echo "<td><a href='../controller/controller.php?opcion=editar&cedula=" . $paciente->getCedula() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                             
                            echo "<td><a href='../controller/controller.php?opcion=eliminar_paciente&cedula=" . $paciente->getCedula() . "'><span class='glyphicon glyphicon-pencil'> Eliminar </span></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No se han cargado datos.";
                    }
        ?>
                </tbody>
            </table>
    </div>
        <script>
            function justNumbers(e)
            {
                var keynum = window.event ? window.event.keyCode : e.which;
                if ((keynum == 8) || (keynum == 46))
                    return true;

                return /\d/.test(String.fromCharCode(keynum));
            }

        </script>
    </body>
</html>
