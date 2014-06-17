<?php
if (isset($_POST['txttema'])) {
    $titulo = $_POST["txttema"];
    $contenido = $_POST["txtcontenido"];

    

include_once("settings/settings.inc.php"); 

$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql = "INSERT INTO temas(titulo,contenido,id_usuario) VALUES ('".$titulo."', '".$contenido."','1')";
$rs_temas = mysql_query($sql, $conexion) or die(mysql_error());
header("location:index.php");

}

?>

<!DOCTYPE html>
<html>
	<head>
<title>Nuevo Tema</title>
	</head>
<body>
  <center>
 <table border="1"> 
 
	<form action="ntema.php" method="POST" name="ntema"><br>
   
		<tr><td><h2>Nuevo Tema <h2></td></tr> 		 
		<tr><td><label>Titulo:<input name="txttema" type="text"  id="txttema" value="" size="30"></td></tr>
		<tr><td><label>Contenido:<input name="txtcontenido" type="text"  id="txtcontenido" value="" size="30"></td></tr>
		 <tr><td><input type="submit" value="Publicar"> </td></tr>
	 
  </form>     
 
 </table>
 </center>
</body>
</html>