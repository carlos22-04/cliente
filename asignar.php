<?php
        require('conexion.php');

        /**
        *@muestra los datos
        */
    if( $_POST)
    {
        $estado_id= $_POST['nombres'];
        $nombre= $_POST['nombre'];
        $apellidos= $_POST['apellidos'];
        $telefono= $_POST['telefono'];
        $email= $_POST['email'];

        /**
        *@inserta los datos en la base de datos como en la pagina para mostrar en la tabla
        *@ manda un mensaje al ser guardado o si hubo un error manda de igual manera un mensaje de error
        */
        $query= "INSERT INTO clientes (estado_id, nombre, apellidos, telefono, email) VALUES ('$estado_id', '$nombre', '$apellidos', '$telefono', '$email')";
        $resultado= $conexion->query( $query);

        if($resultado>0)
        { 
            echo "<script type='text/javascript'>
            window.location='bienvenido.php';
            alert('Guardado satisfactoriamente.');
            </script>";
        }
        else
        { 
            echo "<script type='text/javascript'>
            window.location='asignar.php';
            alert('Error al guardar, intente otra vez.');
            </script>";
        }
    }

    /**
    *@obtiene los datos de la base de datos de estados seleccionando el nombre 
    */
    $sql= "SELECT * from estados";
    $result = $conexion->query($sql);
     
    if ($result->num_rows > 0)
    {
        $nombres="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $nombres .=" <option value='".$row['nombres']."'>".$row['nombres']."</option>";
        }
    }
    else
    {
        echo "No hubo resultados";
    }
   
      /* $sql= "SELECT * from clientes";
    $result = $conexion->query($sql);
     
    if ($result->num_rows > 0)
    {
        $estado_id="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $estado_id .=" <option value='".$row['estado_id']."'>".$row['estado_id']."</option>";
        }
    }
    else
    {
        echo "No hubo resultados";
    }*/

    /**
    *obtiene el nombre del cliente de la base de datos
    */
    $sql="SELECT * from clientes";
    $result = $conexion->query($sql);
     
    if ($result->num_rows > 0)
    {
        $nombre="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $nombre .=" <option value='".$row['nombre']."'>".$row['nombre']."</option>";
        }
    }
    else
    {
        echo "No hubo resultados";
    }

    /**
    *@obtiene los apellidos del cliente de la tabla clientes de la base de datos
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
    }
    else
    {
        echo "No hubo resultados";
    }

    /**
    *@obtiene el telefono del cliente de la base de datos
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
    }
    else
    {
        echo "No hubo resultados";
    }

    /**
    *obtiene el email del cliente de la tabla de la base de datos
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
    }
    else
    {
        echo "No hubo resultados";
    }

    $conexion->close();  //checar esta parte para hacer el insertar en la base de datos
?>
<div class="formreg">
    <h1>tabla agregar cliente</h1>
    <!--- esto es para que se pueda obtener el estilo de las diferentes objetos de la pagina -->
    <link rel="stylesheet" href="style.css"> 
    <form id="registro-frm" name="registro_frm" action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="application/x-www-form-urlencoded">
        <!--<input id="usuario" type="text" name="usuario" placeholder="Nombre de usuario" />-->
        <!--- esto es un combo box para seleccionar los datos de la tabla de estados -->
        <select id="nombres" name="nombres">
        <option value="">estados</option>
            <?php echo $nombres; ?>
        </select>
        <!--- este es el formulario donde el usuario llenara los campos requeridos -->
            <input type="text" name ="nombre" placeholder="nombre" required/>
            <input type="text" name ="apellidos" placeholder="apellidos" required/>
            <input type="text" name ="telefono" placeholder="telefono" required/>
            <input type="email" name ="email" placeholder="email" required/>
        <input id="enviar" style="color: #003366; background-color: #99CCFF" class="botonformreg" type="submit" name="enviar_btn" value="Enviar" />
            <br>
            <br>
            <!--- esto es un hipervinculo para regresar a la pagina principal del sistema -->
            <a class="hipervinculoB" href='bienvenido.php'>regresar a inicio</a>
    </form>
</div>               
