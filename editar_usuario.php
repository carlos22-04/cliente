<?php
    require('conexion.php');
    
    /**
    *@obtiene los datos 
    */
    if($_GET)
    {
        $id= $_GET[ 'id'];
        $query= "SELECT estado_id, nombre, apellidos, telefono, email FROM clientes WHERE id='$id'";
        $resultado= $conexion->query( $query);
        $row= $resultado->fetch_assoc();
    }

    /**
    *@muestra los datos obtenidos
    */
    if($_POST)
    {
        $id= $_POST['id'];
        $estado_id= $_POST[ 'estado_id'];
        $nombre= $_POST[ 'nombre'];
        $apellidos= $_POST[ 'apellidos'];
        $telefono =$_POST[ 'telefono'];
        $email =$_POST[ 'email'];

        $query= "UPDATE clientes SET estado_id='$estado_id', nombre='$nombre', apellidos='$apellidos', telefono='$telefono', email='$email' WHERE id='$id'";
        $resultado= $conexion->query( $query);
        //$row= $resultado->fetch_assoc();
        if($resultado>0)
        { 
            echo "<script type='text/javascript'>
            window.location='bienvenido.php';
            alert('Usuario actualizado satisfactoriamente.');
            </script>";
        }
        else
        { 
            echo "<script type='text/javascript'>
            alert('Error al actualizar usuario, intente otra vez.');
            window.location='javascript:history.back()';
            </script>";
        }
    }
?>

<!--- esta funcion es para la validacion de campos para que estos no esten vacios -->
<script type='text/javascript'>

function valida(){

    var estado_idText = document.getElementById('estado_id');
    var nombreText = document.getElementById('nombre');
    var apellidosText = document.getElementById('apellidos');
    var telefonoText = document.getElementById('telefono');
    var emailText = document.getElementById('email');

    if(estado_idText.value == ''){
        alert('El campo etsado no puede estar vacio');

    }

    if(nombreText.value == ''){
        alert('El campo nombre no puede estar vacio');

    }
    
    if(apellidosText.value == ''){
        alert('El campo apellidos no puede estar vacio');
    }

    if(telefonoText.value == ''){
        alert('El campo telefono no puede estar vacio');
    }

    if(emailText.value == ''){
        alert('El campo email no puede estar vacio');

    }

}

    </script>

<div class="formulario">
    <h1>Formulario de actualizacion:</h1>
    <!--- esta es el formulario o los campos donde el usuario ingresara los datos -->
    <link rel="stylesheet" href="style.css"> 
    <form id="registro-frm" name="registro_frm" action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="application/x-www-form-urlencoded">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <input id="estado_id" type="text" name="estado_id"  placeholder="estado" value="<?php echo $row['estado_id']; ?>"/>
        <input id="nombre" type="text" name="nombre" placeholder="Nombre de usuario" value="<?php echo $row['nombre']; ?>"/>
        <input id="apellidos" type="text" name="apellidos"  placeholder="apellidos" value="<?php echo $row['apellidos']; ?>"/>
        <input id="telefono" type="text" name="telefono"  placeholder="telefono" value="<?php echo $row['telefono']; ?>"/>
        <input id="email" type="email" name="email"  placeholder="email" value="<?php echo $row['email']; ?>"/>
        <input id="enviar" class="botonformulario" style="color: #003366; background-color: #99CCFF" type="button" name="enviar_btn" value="Enviar" Onclick="valida()"/>
            <br>
            <br>
            <!--- este es un hipervinculo que hace la  funcion de regresar a la pagina principal -->
            <a class="hipervinculoB" href='bienvenido.php'>regresar a inicio</a>
    </form>
</div>   
