<?php
    require('conexion.php');
 /**
*@Esta funcion obtiene los datos de la base de datos
  */
   $query= "SELECT id, estado_id, nombre, apellidos, telefono, email FROM clientes";
    $resultado= $conexion->query( $query);


/**
*@obtiee la id de la tabla cientes de la base de datos
*/
    $sql="SELECT * from clientes";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0)
    {
        $id="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $id .=" <option value='".$row['id']."'>".$row['id']."</option>";
        }
    }else{
        echo "No hubo resultados";
    }

/**
*@obtiee el estado_id  de la tabla cientes de la base de datos
*/
    $sql="SELECT * from clientes";
    $result = $conexion->query($sql); //Conexion para dar resultado a las variables
     
    if ($result->num_rows > 0) //Si la variable tiene al menos 1 fila continua
    {
        $estado_id="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $estado_id .=" <option value='".$row['estado_id']."'>".$row['estado_id']."</option>"; //Se concatena las options para ser insertadas en el HTML
        }
    }else{
        echo "No hubo resultados";
    }

/**
*@obtiee el nombre de la tabla cientes de la base de datos
*/
    $sql="SELECT * from clientes";
    $result = $conexion->query($sql); //Conexion para dar resultado a las variables
     
    if ($result->num_rows > 0) //Si la variable tiene al menos 1 fila continua
    {
        $nombre="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $nombre .=" <option value='".$row['nombre']."'>".$row['nombre']."</option>"; //Se concatena las options para ser insertadas en el HTML
        }
    }else{
        echo "No hubo resultados";
    }

/**
*@obtiee los apellidos de la tabla cientes de la base de datos
*/
    $sql="SELECT * from clientes";
    $result = $conexion->query($sql); //Conexion para dar resultado a las variables
     
    if ($result->num_rows > 0) //Si la variable tiene al menos 1 fila continua
    {
        $apellidos="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $apellidos .=" <option value='".$row['apellidos']."'>".$row['apellidos']."</option>"; //Se concatena las options para ser insertadas en el HTML
        }
    }else{
        echo "No hubo resultados";
    }

/**
*@obtiee el telefono de la tabla cientes de la base de datos
*/
    $sql="SELECT * from clientes";
    $result = $conexion->query($sql); //Conexion para dar resultado a las variables
     
    if ($result->num_rows > 0) //Si la variable tiene al menos 1 fila continua
    {
        $telefono="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $telefono .=" <option value='".$row['telefono']."'>".$row['telefono']."</option>"; //Se concatena las options para ser insertadas en el HTML
        }
    }else{
        echo "No hubo resultados";
    }

/**
*@obtiee el email de la tabla cientes de la base de datos
*/
    $sql="SELECT * from clientes";
    $result = $conexion->query($sql); //Conexion para dar resultado a las variables
     
    if ($result->num_rows > 0) //Si la variable tiene al menos 1 fila continua
    {
        $email="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $email .=" <option value='".$row['email']."'>".$row['email']."</option>"; //Se concatena las options para ser insertadas en el HTML
        }
    }else{
        echo "No hubo resultados";
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Clientes</title>
<link rel="stylesheet" href="style.css"> 
<!---@author [Carlos Alberto Yañez Navarro] [<car_22_04_95@hotmail.com>]-->
<meta charset="utf-8" />
</head>
<body>
<h2>Tabla Clientes:</h2>
    <a class="hipervinculoB" href="asignar.php">Agregar Cliente</a><br><br>
    <!--- estos son los datos que se muestran en la tabla de la pagina -->
    <table id="tablaclientes">
        <tbody class="tbody">
            <tr>
                <th>Id</th>
                <th>estado</th>
                <th>nombre</th>
                <th>apellidos</th>
                <th>telefono</th>
                <th>email</th>
                <th>Opciones</th>
            </tr>
            <?php
        while($row=$resultado->fetch_assoc())
        { 
            ?>
            <!--- obtiene los datos de la funcion de arriba para mostrarlos en la tabla de la pagina -->
            <tr class="tr1">

                <td>
                <?php
                    echo $row['id'];
                ?>
                </td>
                <td>
                <?php
                    echo $row['estado_id'];
                ?>
                </td>
                <td>
                <?php 
                    echo $row['nombre'];
                ?>
                </td>
                 <td>
                <?php
                    echo $row['apellidos'];
                ?>
                </td>
                <td>
                <?php
                    echo $row['telefono'];
                ?>
                </td>
                <td>
                <?php
                    echo $row['email'];
                ?>
                </td>
                <td>
                    <!--- son los botones que se encuentran a un costado de los datos del cliente -->
                    <a class="hipervinculo botonactualizar" href="editar_usuario.php?id=<?php echo $row['id'];?>">Modificar</a>
                    <a class="hipervinculo botoneliminar" href="eliminar_usuario.php?id=<?php echo $row['id'];?>">Eliminar</a>
                </td>
            </tr>
    <?php
        }
    ?>
        </tbody>
    </table>