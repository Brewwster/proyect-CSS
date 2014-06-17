<?php
if (isset($_GET['idtema'])) {
	$idtema= $_GET['idtema'];
    $idusr= $_GET['idusr'];
}

if (isset($_POST['txtcomentario'])) {
    $comentario= $_POST["txtcomentario"];
    $idtema= $_POST['idtema'];
    $idusr= $_POST['idusr'];
  

include_once("settings/settings.inc.php"); 

$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql = "INSERT INTO comentarios (comentario,id_temas,id_usuario) VALUES ('".$comentario."', '".$idtema."','".$idusr."')";
$rs_comentarios = mysql_query($sql, $conexion) or die(mysql_error());
header("location:index.php");

}

?>

<!DOCTYPE html>
<html>
	<head>
<title>Comentario</title>
	</head>
<body>
  <center>
 <table border="1"> 
 
	<form action="comentar.php" method="POST" name="comentar"><br>
   
		<tr><td><h2>Comentar<h2></td></tr> 		 
		 <tr><td>
		 	<input type="hidden" name="idtema" value="<?php echo "$idtema"; ?>">
		 	<input type="hidden" name="idusr" value="<?php echo "$idusr"; ?>">
		 	<tr><td><label>Comentar<input name="txtcomentario" type="text"  id="txtcomentario" value="" ></td></tr>
		 </td></tr>
		 <tr><td><input type="submit" value="Comentar"> </td></tr>
		 
	 
  </form>
 
 </table>
 </center>
</body>
</html>