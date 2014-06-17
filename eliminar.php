<?php
include_once("settings/settings.inc.php"); 

$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql      = "DELETE from alumnos WHERE id ="         ;
$temas    = @mysql_query($sql, $conexion);

header("location:index.php");
?>