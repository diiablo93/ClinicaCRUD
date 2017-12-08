<!DOCTYPE html>
<?php
include  '../model/CrudModel.php';
require_once '../model/medico.php';
session_start();
$crudModel = new CrudModel();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Medicos</title>
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
                <h3>Medicos</h3>
            </div>
             <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            
            <p>
            <table  width="100%"  border="0" cellspacing="0" cellpadding="0">    
            <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_medico">
                   <tr>
                       <td>Categoria Medica:</td>
                           <td><select name="id_categoria">
                    <?php
                    
                    $listarCategoria = $crudModel->getCategorias();
                    print_r($listarCategoria);
                    foreach ($listarCategoria as $categoria) {
                        echo "<option value='" . $categoria->getNombre_categoria(). "'>" . $categoria->getNombre_categoria(). "</option>";
                    }
                    ?>
                           </select>
                           </td>
                   </tr>
                       <tr>
                        <td>Nombres</td>
                        <td><input id="ingreso" required title="Nombres" type="text" pattern="^[a-zA-Z\_\-\.\s]*$" name="nombre_medico" size="30" maxlength="28"></td>
                    </tr>
                     <tr>
                        <td>Apellidos</td>
                        <td><input id="ingreso" required  title="Apellidos" type="text" pattern="^[a-zA-Z\_\-\.\s]*$" name="apellido_medico"size="30" maxlength="28"></td>
                    </tr> 
                    <tr>
                        <td>Email</td>
                        <td><input id="ingreso" required title="Email" type="text"  name="email"size="30" maxlength="28"></td>
                    </tr>

                    <tr>
                        <td>Telefono</td>
                        <td><input id="ingreso"  title="Telefono" onkeypress="return justNumbers(event);" type="text" name="telefono" size="10" maxlength="10"></td>
                    </tr>
                    
                        <td height="40" valign="middle"><input type="submit" value="Crear"></td>
                    </tr>
                </form>
        </table>
            <table>
            <tr><td><form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="listar_medicos">
                        <br>
                        <input type="submit" class="btn btn-info" value="Consultar Medicos">
                    </form></td>



            </tr>
        </table>
            </p>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>CATEGORIA</th>
                        <th>ID_MEDICO</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>EMAIL</th>
                        <th>TELEFONO</th>
                       
                        <th>ELIMINAR</th>
                       <!--<th>OPCIONES</th>-->
                    </tr>
                </thead>
                <tbody>
        
        <?php
    
        if (isset($_SESSION['listado'])) {
               
                        $listado = unserialize($_SESSION['listado']);
                        
                      
                        foreach ($listado as $medico) {
                            echo "<tr>";
                            echo "<td>" . $medico->getId_categoria() . "</td>";
                            echo "<td>" . $medico->getId_medico() . "</td>";
                            echo "<td>" . $medico->getNombre_medico() . "</td>";
                            echo "<td>" . $medico->getApellido_medico() . "</td>";
                            echo "<td>" . $medico->getEmail() . "</td>";
                            echo "<td>" . $medico->getTelefono() . "</td>";
                                                  //  echo "<td><a href='../controller/controller.php?opcion=editar_medico&id_medico=" . $medico->getId_medico() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                            
                            echo "<td><a href='../controller/controller.php?opcion=eliminar_medico&id_medico=" . $medico->getId_medico() . "'><span class='glyphicon glyphicon-remove'> Eliminar </span></a></td>";

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