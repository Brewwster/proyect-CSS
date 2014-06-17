<?php
include_once("settings/settings.inc.php");
$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
    $db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
    $sql      = "select * from producto";
    $producto    = @mysql_query($sql, $conexion);
    
    echo "<table border='1'>";
    echo"<center>";

    while ($producto = @mysql_fetch_array($productos))
    {
         $sql      = "select * from producto";
    	echo "<tr>";
	    
        echo "<td>".$productos['cantidad']."</td>";

        echo "<td>".$productos['producto']."</td>";
        echo "<td>".$productos['precio']."</td>";
	echo "</tr>";
   }
	?>	
  