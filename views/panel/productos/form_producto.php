<?php 
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    

    $DataTipo = CRUD("SELECT * FROM proveedores","s");
    $DataCategoria = CRUD("SELECT * FROM categorias","s");
?>
<script src="./public/js/funciones-productos.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="FormNewProducto" enctype="multipart/formdata">
    
    <!-- codigo del producto, puede ser un codigo de barras, no confundir el codigo con el ID del producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Codigo Producto: </span>
        </div>
        <input type="text" name="codigo" class="form-control" placeholder="Codigo" required="ON">
    </div>
    <!-- producto, tambien se le puede llamar el nombre el producto -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Producto: </span>
        </div>
        <input type="text" name="producto" id="clave" class="form-control" required="ON" placeholder="producto">
    </div>
    <!-- escribir una breve descripcion del producto, para saber que de que el producto que se introduce -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Descripción: </span>
        </div>
        <input type="text" name="descripcion" id="clave" class="form-control" required="ON" placeholder="descripcion corta">
    </div>
    <!-- precio del producto cuando esta en venta, diferente al precio de compra -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Venta: </span>
        </div>
        <input type="text" name="precio_venta" id="precio_venta" class="form-control" required="ON" placeholder="0.00 C/U">
    </div>
    <!-- precio de compra del producto, el cual es por unidad -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Compra: </span>
        </div>
        <input type="text" name="precio_compra" id="precio_compra" class="form-control" required="ON" placeholder="0.00 C/U">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Proveedores:</label>
        </div>
        <select class="custom-select" name="proveedor" id="proveedor">
            <option value="0"  selected>Seleccione Proveedor</option>
        <?php foreach($DataTipo AS $result):?>
            <option value="<?php echo $result['idproveedor'];?>"><?php echo $result['proveedor'];?></option>
        <?php endforeach?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Categoria:</label>
        </div>
        <select class="custom-select" name="categoria" id="tipo-categoria">
            <option value="0"  selected>Seleccione Proveedor</option>
        <?php foreach($DataCategoria AS $result):?>
            <option value="<?php echo $result['idcategoria'];?>"><?php echo $result['categoria'];?></option>
        <?php endforeach?>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Fecha: </span>
        </div>
        <input type="datetime-local" name="fecha" id="fecha" class="form-control" required="ON" placeholder="0.00 C/U">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Stock: </span>
        </div>
        <input type="text" name="stock" placeholder="Cantidad de producto" class="form-control" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input imagen" name="imagen" id="" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Foto del Producto</label>
        </div>
    </div>
    <div>
        <img src="" width="200px" alt="" id="muestraimagen">
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>