<!DOCTYPE html>
<?php
session_start();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Agendacion de Citas</title>
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
                <h3>Sistema de Citas</h3>
            </div>
            <div class="row">
                <a class="btn btn-success" href="pacientes.php">Pacientes</a>
                <a class="btn btn-success" href="categorias.php">Categoria Medica</a>
                <a class="btn btn-success" href="medicoss.php">Medicos</a>
                <a class="btn btn-success" href="../controller/controller.php?opcion=listar_reserva">Agendacion y Consulta de Citas</a>
                
            </div>
           
        </div>
      
    </body>
      
</html>

