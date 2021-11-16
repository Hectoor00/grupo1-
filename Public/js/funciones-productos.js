$(document).ready(function() {
    /* carga contenido productos*/
    $(".productos").click(function(event) {
        $("#contenido-panel").load("./views/panel/productos/principal.php");
        event.preventDefault();
    });
    /* Despliega Modal Registro de Nuevo producto*/
    $(".new-producto").click(function(event) {
        $("#ModalNewProducto").modal("show");
        $("#DataFormProducto").load("./views/panel/productos/form_producto.php");
        event.preventDefault();
    });
    
    /* Despliega Modal Editar Producto*/
    $(".upd-producto").click(function() {
        var idproducto = $(this).attr("id-producto");
        $('#ProductoUpd').modal('show');
        $("#dataProducto").load("./views/panel/productos/edit_form_productos.php?idproducto=" + idproducto);
    });

    /* Paginado para los productos*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/productos/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/productos/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Busca Usuario*/
    $("#like-user").on('change', function(event) {
        var valor;
        valor = $("#like-user").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Usuario", "No ingreso el nombre ó código de usuario a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/productos/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });
    /* Eliminar Usuario */
    $("a.del-user").click(function(event) {
        var idusuario = $(this).attr("id-usuario");
        alertify.confirm('Eliminar Usuario', 'Seguro/a de eliminar usuario',
            function() {
                $("#contenido-panel").load("./views/panel/usuarios/del.php?idusuario=" + idusuario);
                event.preventDefault();
            },
            function() {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });
    /* Nuevo Productos*/
    $("#FormNewProducto").on("submit", function(event) {
        event.preventDefault();
        var proveedor = $('#proveedor option:selected').val();
        var categoria = $('#categoria option:selected').val();
        if (proveedor == 0) {
            alertify.alert("Registro Producto", "No seleciono el tipo de proveedor...");
            event.preventDefault();
        } else if (categoria ==0) {
            alertify.alert("Registro Producto", "No seleccione la categoria...");
            event.preventDefault();
        } else {
            var formData = new FormData(document.getElementById("FormNewProducto"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/productos/insert.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                });
        }
        
    });
    /* Editar Usuario*/
    $("#UpdateUsuario").on("submit", function(event) {
        var tipo = $('#tipo-user').val();
        event.preventDefault();
        if (tipo == 0) {
            alertify.alert("Registro Usuario", "No seleciono el tipo de usuario...");
            event.preventDefault();
        } else {
            var formData = new FormData(document.getElementById("UpdateUsuario"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/usuarios/update.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                });
        }
    });
});