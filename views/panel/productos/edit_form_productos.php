<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idproducto = $_GET['idproducto'];
    
    $DataProducto = CRUD("SELECT * FROM productos WHERE idproducto = '$idproducto'","s");

    foreach ($DataProducto AS $result)
    {
        $codigo =$result['codproducto'];
        $producto =$result['producto'];
        $descripcion =$result['descripcion'];
        $precio_venta =$result['precio_venta'];
        $precio_compra =$result['precio_compra'];
        $proveedor =$result['idproveedor'];
        $categoria =$result['idcategoria'];
        $stock =$result['stock'];
        $estado=1;
    }

    //para llamar la informacion del proveedor y poder actualizar si es necesario en el producto
    $DataProveedor = CRUD("SELECT * FROM proveedores WHERE idproveedor != '$proveedor'","s");
    $nombre_proveedor = buscavalor("proveedores","proveedor","idproveedor = '$proveedor'");

    //para llamar la informacion de la categoria y poder actualizar si es necesario en el producto
    $DataCategoria = CRUD("SELECT * FROM categorias WHERE idcategoria != '$categoria'","s");
    $nombre_categoria = buscavalor("categorias","categoria","idcategoria = '$categoria'");
?>
<script src="./public/js/funciones-productos.js"></script>
<script src="./public/js/funciones.js"></script>

<form id="UpdateProducto" enctype="multipart/formdata">
    <input type="hidden" name="idusuario" value="<?php echo $idproducto;?>">
    <!-- codigo del producto, puede ser un codigo de barras, no confundir el codigo con el ID del producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1" >Codigo Producto: </span>
        </div>
        <input type="text" name="codigo" value="<?php echo $codigo;?>" class="form-control" placeholder="Codigo" required="ON">
    </div>
    <!-- producto, tambien se le puede llamar el nombre el producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Producto: </span>
        </div>
        <input type="text" name="producto" id="clave" value="<?php echo $producto;?>" class="form-control" required="ON" placeholder="producto">
    </div>
    <!-- escribir una breve descripcion del producto, para saber que de que el producto que se introduce -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Descripción: </span>
        </div>
        <input type="text" name="descripcion" id="clave" value="<?php echo $descripcion;?>" class="form-control" required="ON" placeholder="descripcion corta">
    </div>
    <!-- precio del producto cuando esta en venta, diferente al precio de compra -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Venta: </span>
        </div>
        <input type="text" name="precio_venta" id="precio_venta" value="<?php echo $precio_venta;?>" class="form-control" required="ON" placeholder="0.00 C/U">
    </div>
    <!-- precio de compra del producto, el cual es por unidad -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Compra: </span>
        </div>
        <input type="text" name="precio_compra" id="precio_compra" value="<?php echo $precio_compra;?>" class="form-control" required="ON" placeholder="0.00 C/U">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Proveedores:</label>
        </div>
        <select class="custom-select" name="proveedor" id="proveedor">
            <option  value="<?php echo $proveedor;?>"  selected><?php echo $nombre_proveedor; ?></option>
        <?php foreach($DataProveedor AS $result):?>
            <option value="<?php echo $result['idproveedor'];?>"><?php echo $result['proveedor'];?></option>
        <?php endforeach?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Categoria:</label>
        </div>
        <select class="custom-select" name="categoria" id="tipo-categoria">
        <option  value="<?php echo $categoria;?>"  selected><?php echo $nombre_categoria; ?></option>
        <?php foreach($DataCategoria AS $result):?>
            <option value="<?php echo $result['idcategoria'];?>"><?php echo $result['categoria'];?></option>
        <?php endforeach?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Stock: </span>
        </div>
        <input type="text" name="stock" value="<?php echo $stock;?>" placeholder="Cantidad de producto" class="form-control" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Cambiar Foto</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input imagen" name="imagen2" id="" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <div>
        <img src="" width="200px" alt="" id="muestraimagen">
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>