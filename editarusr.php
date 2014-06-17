<?php

include_once("settings/settings.inc.php");
$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());

// Actualiza tipo de usuario
if (isset($_GET['idusr'])) {
	$idus = $_GET['idusr'];
	$tipo = $_GET['tipo'];

	$sql1 = "UPDATE usuarios SET tipo = '$tipo' WHERE id = '$idus'";
	$usuarios = @mysql_query($sql1, $conexion);
}





if (isset($_GET['borraridusr'])) {
	$usr = $_GET['borraridusr'];

	$sql2 = "DELETE FROM usuarios WHERE id = $usr";  
	$usuarios   = @mysql_query($sql2, $conexion);
}


$sql        = "select id,tipo,nombre,usuario from usuarios";
$usuarios   = @mysql_query($sql, $conexion);



?>

<!doctype html>
<html>  
	<body>  
		   <meta charset="UTF-8">
	  <center>
		<form name= "editarurs" action="validarlogin.php" method="POST" name="admin">
		<center>
          <h1>EDITAR USUARIO</h1>
        </center>
		<TABLE  CELLSPACING="18" WIDTH="150">  
          <?php
            while($usuario = @mysql_fetch_array($usuarios))
            {
            echo"<tr>";
          	    echo "<td><b><center>";echo"<input name='nuevan' type='text'  id='contenido' value= '".$usuario['nombre']."'"; echo"</center></b></td>";
          	      echo "<td><b><center>";echo"<input name='nuevan' type='text'  id='contenido' value= '".$usuario['usuario']."'"; echo"</center></b></td>";
                  echo"<td><b><center>"; echo"<input name='nueva' type='text'  id='contenido' value=''"; echo "</center> </b> </td>";
             	echo "<td><a href='editarusr.php?idusr=".$usuario['id']."&tipo=1'>Administrador</a></td>";
             	echo "<td><a href='editarusr.php?idusr=".$usuario['id']."&tipo=2'>Editor</a></td>";
             	echo "<td><a href='editarusr.php?idusr=".$usuario['id']."&tipo=3'>Usuario</a></td>";
             	echo "<td><a href='editarusr.php?borraridusr=".$usuario['id']."'>Borrar</a></td>";
             	echo "<td><b><center>".$usuario['tipo']."</center></b></td>";
            echo"</tr>";
	   	    } 
	   	    echo"<tr>";
	   	        
             	echo" <a href= 'index.php'> Regresar </a>";
	   		echo"</tr>";
	   		 echo"<tr>";
	   		echo" <input type='submit' value='Actualizar'";
	   		echo"</tr>";
	   	  
	   	  ?>
		
		</center>
		</table>
		</form>
	  </center>
	</body>
</html>
