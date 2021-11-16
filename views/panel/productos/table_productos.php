<style>
    .cHead {
        vertical-align: middle;
        text-align: center;
    }
</style>
<table class="table table-borderless table-hover table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th class="ch">N°</th>
            <th class="ch">Código</th>
            <th class="ch">producto</th>
            <th class="ch">descripcion</th>
            <th class="ch">Precio Venta</th>
            <th class="ch">Precio Compra</th>
            <th class="ch">proveedor</th>
            <th class="ch">Categoria</th>
            <th class="ch">stock</th>
            <th class="ch">Actualizar</th>
            <td class="ch">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataUser as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['codproducto']; ?></td>
                <td class="ch"><?php echo $result['producto']; ?></td>
                <td class="ch"><?php echo $result['descripcion']; ?></td>
                <td class="ch"><?php echo $result['precio_venta']; ?></td>
                <td class="ch"><?php echo $result['precio_compra']; ?></td>
                <td class="ch"><?php echo $result['idproveedor']; ?></td>
                <td class="ch"><?php echo $result['idcategoria']; ?></td>
                <td class="ch"><?php echo $result['stock']; ?></td>
                <td class="ch">
                    <a href="" class="btn btn-success upd-producto" data-toggle="modal" id-producto="<?php echo $result['idproducto']; ?>"><i class="fas fa-user-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger del-user" id-usuario="<?php echo $result['idproducto']; ?>"><i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>