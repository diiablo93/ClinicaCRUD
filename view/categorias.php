<!DOCTYPE html>
<?php
require_once '../model/categoria.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Categoria</title>
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
                <h3>Categoria</h3>
            </div>
             <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
                <form action="../controller/controller.php">
                    <input type="hidden" name="opcion" value="crear_categoria">
<!--                    Id_Categoria<input type="text" name="id_categoria" maxlength="10" required="true">-->
                    Nombre Categoria:<input type="text" name="nombre_categoria" maxlength="30" required="true">
                    
                    <input type="submit" value="Crear">
                </form>
            <table>
            <tr><td><form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="listar_categoria">
                        <br>
                        <input type="submit" class="btn btn-info" value="Consultar Categoria">
                    </form></td>



            </tr>
        </table>
            </p>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>ID CATEGORIA</th>
                        <th>NOMBRE CATEGORIA</th>
                        
                    </tr>
                </thead>
                <tbody>
        
        <?php
    
        if (isset($_SESSION['listarCategoria'])) {
               
                        $listarCategoria = unserialize($_SESSION['listarCategoria']);
                        
                      
                        foreach ($listarCategoria as $categoria) {
                            echo "<tr>";
                            echo "<td>" . $categoria->getId_categoria() . "</td>";
                            echo "<td>" . $categoria->getNombre_categoria(). "</td>";
                            
//                            echo "<td><a href='../controller/controller.php?opcion=editar&id_categoria=" . $categoria->getId_categoria() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
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