<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    
    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $precio_venta = $_POST['precio_venta'];
    $precio_compra = $_POST['precio_compra'];
    $proveedor = $_POST['proveedor'];
    $categoria = $_POST['categoria'];
    $fecha = $_POST['fecha'];
    $stock = $_POST['stock'];
    $estado=1;
    // Obtenemos los atributos del archivo
    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $path = "../../../public/img/productos/";

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));//Obtenemos la extención del archivo
    $newName = $producto.".".$imgExt;//Asignamos un nuevo nombre al archivo

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    $tabla = "productos";
    $campos = "codproducto, producto, descripcion, precio_venta, precio_compra, idproveedor,idcategoria,fecha_ingreso,stock,imagen,estado";
    $valores = "'$codigo','$producto','$descripcion','$precio_venta','$precio_compra','$proveedor','$categoria','$fecha','$stock','$newName','$estado'";

    $query1 = "SELECT * FROM productos WHERE producto = '$producto'";

?>
<?php if(CountReg($query1)!= 0):?>
    <script>
        alertify.error("Producto ya registrado intente con uno nuevo...");
        $("#ModalNewProducto").modal("hide");
        $("#contenido-panel").load("./views/panel/productos/principal.php");
    </script>
<?php else:?>
    <?php 
        switch($carga_img)
        {
            case 0;
                echo '<script>
                        alertify.error("Error datos e Imagen no cargados...");
                        $("#ModalNewProducto").modal("hide");
                        $("#contenido-panel").load("./views/panel/productos/principal.php");
                    </script>';
                break;
            case 1:
                $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

                 if(CRUD($query2,"i")){
                    echo '<script>
                            alertify.success("Datos registrados...");
                            $("#ModalNewProducto").modal("hide");
                            $("#contenido-panel").load("./views/panel/productos/principal.php");
                        </script>';
                 }
                 else{
                    echo '<script>
                        alert("Error al registrar datos...");
                        $("#ModalNewProducto").modal("hide");
                        $("#contenido-panel").load("./views/panel/productos/principal.php");
                    </script>';
                 }
            break;
        }
    ?>
<?php endif?>
