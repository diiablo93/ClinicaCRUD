<?php
$host="node150576-proy-optativa2.jelasticlw.com.br";
$user="Lizeth";
$pass="LnXmjbit0ZARfU2q";
$database_con=mysql_connect($host,$user,$pass);
if(!$database_con){echo "<h2>MySQL Error! </h2>";
exit;}
mysql_select_db("odontologia", $database_con);
?>