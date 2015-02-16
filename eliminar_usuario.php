<meta charset="utf-8" />
<?php
        require('conexion.php');
?>
    <script type="text/jscript">
<?php
/**
*@esta funcion espara eliminar los datos de la pagina y de la base de datos
*@manda un mensaje para comfirmar la eliminacion
*@tambien recargara la pagina al eliminar el dato de la pagina
*/
    if(isset($_GET['confirm']) && $_GET['confirm']==true)
    {
        $id= $_GET['id'];
        $query= "DELETE FROM clientes WHERE id='$id'";
        $resultado= $conexion->query( $query); 
        echo "window.location='bienvenido.php';";
    }
    else 
    {
?>
        if(confirm(" ADVERTENCIA: ¿Esta seguro que desea eliminar el registro?"))
        {
            alert('cliente eliminado satisfactoriamente.');
            window.location='eliminar_usuario.php?id=<?php echo $_GET['id'];?>&confirm=true';
        }
        else
        {
            alert('cliente no eliminado.');
            window.location='bienvenido.php';
        }
<?php
    }
?>
    </script>