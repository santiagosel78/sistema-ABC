function calcularImpuesto() {
    var costo = $('#rlz_ing_costo').val();
    if (costo != 0) {

        var imp = costo * 0.12;
        var impuesto_round = imp.toFixed(2);

        var sumtotal = costo - imp;
        var sumtotal_round = sumtotal.toFixed(2);

        $('#rlz_ing_impuesto').val(impuesto_round);
        $('#rlz_ing_total').val(sumtotal_round);
    }
    if (costo == 0) {
        $('#rlz_ing_impuesto').val("");
        $('#rlz_ing_total').val("");
    }
}

/*obtener todas las variables para realizar el ingreso*/
$('#btnAgregarIngreso').on('click', function () {
    var idproveedor = $('#idproveedor').val();
    var idusuario = $('#idusuario').val();
    var tipo_comprobante = $('#tipo_comprobante').val();
    var serie_comprobante = $('#serie_comprobante').val();
    var num_comprobante = $('#num_comprobante').val();
    var fecha = $('#fecha').val();
    var impuesto = $('#impuesto').val();
    var total = $('#total').val();
    var idarticulo = $('#idarticulo').val();
    var caja = $('#idarticulo').val();
    var cantidad = $('#cantidad').val();
    var total_c = $('#total_c').val();
    var precio = $('#precio').val();

    console.log(idproveedor + idusuario + tipo_comprobante + serie_comprobante + num_comprobante + 
                fecha + impuesto + total + idarticulo + caja + cantidad + total_c + precio);

    if (idproveedor == "" ||
        idusuario == "" ||
        tipo_comprobante == "" ||
        serie_comprobante == "" ||
        num_comprobante == "" ||
        fecha == "" ||
        impuesto == "" ||
        total == "" ||
        idarticulo == "" ||
        caja == "" ||
        cantidad == "" ||
        total_c == "" ||
        precio == "" 
        ) {
        alert("Todos los campos son obligatorios");
        return false;
    }

    $.ajax({
        type: 'POST',
        data: "crear_Ingreso=1&idproveedor=" + 
            idproveedor +
            "&idusuario=" + idusuario +
            "&tipo_comprobante=" + tipo_comprobante +
            "&serie_comprobante=" + serie_comprobante +
            "&num_comprobante=" + num_comprobante +
            "&fecha=" + fecha +
            "&impuesto=" + impuesto +
            "&total=" + total +
            "&idarticulo=" + idarticulo +
            "&caja=" + caja +
            "&cantidad=" + cantidad +
            "&total_c=" + total_c +
            "&precio=" + precio,
        url: 'modules/ingresos/IngresosController.php',
        dataType: 'json',
        success: function (data) {
            var resultado = data.resultado;
            if(resultado === 1){
                $("#formNuevoIngreso").modal("hide");
                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                alert("Ingreso creado exitosamente");
                CargarContenido("modules/ingresos/listadoIngresos.php");
              } else {
                alert("No se pudo crear el Ingreso");
              }
        }
    });
});


