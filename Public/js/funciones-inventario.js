$(document).ready(function () {

    /*Paginado de los productos*/
    $("a.pagina").click(function (event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("inventario/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    /*Aumenta N° regsitros para el paginado*/
    $("#select-reg").on('change', function (event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("inventario/principal.php?num_reg=" + valor);
        event.preventDefault();
    });
    /* Busca producto*/
    $("#like-user").on('change', function (event) {
        var valor;
        valor = $("#like-user").val();
        if (valor.trim() == "") {
            alertify.alert("Busca producto", "No ingreso el nombre o codigo de prducto a buscar...")
            event.preventDefault();
        }
        else {
            $("#contenido").load("inventario/principal.php?like=1&valor=" + valor);
        event.preventDefault();
        }
    });
});