<?php
include '../../../Models/conexion.php';
include '../../../Controllers/prosesos.php';
include '../../../Models/procesos.php';

echo $id_proveedor = $_POST['id_proveedor'];
echo $nombre= $_POST['proveedor'];
echo $direccion = $_POST['direccion'];
echo $telefono = $_POST['telefono'];
echo $correo = $_POST['correo'];
?>
<?php if (CRUD(" UPDATE productos SET nombre ='$nombre',direccion='$direccion',telefono='$telefono',correo='$correo'  WHERE id_proveedor='$id_proveedor'", "u")) : ?>
    <script>
        alertify.success("Producto Actualizado...");
        $('#UserUpd').modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php else : ?>
    <script>
        alert("Error al actualizar Producto...");
        $('#UserUpd').modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php endif ?>