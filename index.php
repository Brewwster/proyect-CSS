<?php
  session_start();

  include_once("settings/settings.inc.php");

  if (isset($_SESSION ['tipo'])) {
    $tipo = $_SESSION ['tipo'];
    $nombre = $_SESSION["nombre"];
    $usrlog = $_SESSION['idusr'];
  }
  else
  {
    $tipo = 0;
    $nombre = "";
    $usrlog = 0;
  }

  // Borrar tema
  if (isset($_GET['ideliminar'])) {
    if ($tipo == 1) {
      $ideliminar = $_GET['ideliminar'];

      $conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
      $db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
      $sql      = "DELETE FROM temas WHERE id =".$ideliminar;
      $temadel  = @mysql_query($sql, $conexion);
    
    
  }

   } 
   if (isset($_GET['ideliminarcom'])) {
    if ($tipo == 1) {
      $ideliminarcom = $_GET['ideliminarcom'];

      $conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
      $db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
      $sql      = "DELETE FROM comentarios WHERE id =".$ideliminarcom;
      $comentariodel  = @mysql_query($sql, $conexion); 

   }
   }



?>
     

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <title>BLOG</title>

    <meta charset="UTF-8">

  </head>

<body>
  <?php
    echo "<center>";
    if ($tipo > 0) {


      echo "<h1>¡Bienvenido a mi Blog! " .$_SESSION["nombre"]."</h1>";
      echo"<P ALIGN=right>";
        if ($tipo=='1')
              echo" <a href='editarusr.php'> Editar usuarios- </a>";
      echo"<a href='cerrar.php'> Cerrar Sesion </a>"; 

    }
    else
    {
      echo "<h1>¡Bienvenido a mi Blog!</h1>";

      echo"<P ALIGN=right>";
    
       echo"<a href='login.php'> LOGEARSE </a><br>";


      echo"<a href='usuarios.php'>REGISTRARSE</a>";
      echo "</center>";        
    } 

    $conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
    $db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
    $sql      = "select temas.*, usuarios.nombre from temas, usuarios where temas.id_usuario = usuarios.id ORDER BY temas.id DESC";
    $temas    = @mysql_query($sql, $conexion);

    echo"<center>";
    echo "<table width='80%'>";
    while ($tema = @mysql_fetch_array($temas))
    {
        /*
         * Muestra temas 
         */
        echo "<tr>";
          echo"<td colspan = '3'><h2>".$tema['titulo']."</h2></td>";
             echo "<td colspan = '3'>";
             if ($tipo=='1')
              echo" <a href='ntema.php'> Nuevo Tema- </a>";
             if ($tipo>'0')
          echo" <a href='comentar.php?idtema=".$tema['id']."&idusr=".$usrlog."'> Comentar- </a>";

             if ($tipo=='1' or $tipo == '2' )
              echo" <a href='editar.php?ideditar=".$tema['id']."&idusr=".$usrlog."''> Editar-</a>";
             if ($tipo=='1')
              echo" <a href='index.php?ideliminar=".$tema['id']."'> Eliminar</a>";
         
         echo "</tr>";
                 
        echo "<tr>";
          echo "<td colspan = '5'>".$tema['fecha_pub']. " - " .$tema['nombre']."</td>";

        echo "</tr>";

        echo "<tr>";
          echo "<td> >>> </td>";
          echo "<td colspan= '4'>".$tema['contenido']."</td>";
        echo "</tr>";

        echo"<tr>";
          echo"<td colspan = '5'>";
          if ($tipo>'0')
          echo" <a href=  > Like </a>";

        echo"</tr>";

        $sql1= "select comentarios.*, usuarios.nombre from comentarios, temas, usuarios " . 
            "where comentarios.id_usuario = usuarios.id and comentarios.id_temas = temas.id and comentarios.id_temas =" . $tema['id'];
        $comentarios = mysql_query($sql1, $conexion);
        echo "<table width='80%'>";
        
        while ($comentario=@mysql_fetch_array($comentarios))
        {
              echo"<tr>";
              echo "<td colspan = '5'>";
              if ($tipo=='1' or $tipo == '2' )
              echo" <a href='ceditar.php'> Editar- </a>";
             if ($tipo=='1' or $tipo == '2' )
          echo" <a href='index.php?ideliminarcom=".$comentario['id']."'> Eliminar</a>";
            echo"</tr>";
            echo"<tr>";
              echo"<td colspan = '5'>" . $comentario['nombre'] . " - " . $comentario['fecha_pub']."</td>";
             echo"</tr>";
              

            echo"<tr>";
              echo"<td colspan = '5'>" . $comentario['comentario'] . "</td>";
            
            echo"</tr>";
            }
         }
        
   

    echo"</center>";
    echo "</table>";

    @mysql_close($conexion);

  ?>
</body>
</html> 