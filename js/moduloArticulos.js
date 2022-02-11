$("#btnAgregarArticulo").on("click", function () {
    var id_categoria = $("#id_categoria_art").val();
    var codigo = $("#codigo_art").val();
    var nombre = $("#nombre_art").val();
    var precio_venta = $("#precio_venta_art").val();
    var stock = $("#stock_art").val();
    var descripcion = $("#descripcion_art").val();
    var imagen = $("#imagen_art").val();
    var estado = $("#estado_art").val();

  console.log(id_categoria + codigo + nombre + precio_venta + stock + descripcion + imagen + estado);
    if (
      id_categoria == "" ||
      codigo == "" ||
      nombre == "" ||
      precio_venta == "" ||
      stock == "" ||
      descripcion == "" ||
      imagen == "" ||
      estado == ""

    ) {
      alert("Todos los campos son obligatorios");
      return false;
    }
    
  
    $.ajax({
      type: "POST",
      data:
        "crear_articulo=1&id_categoria=" +
        id_categoria +
        "&codigo=" +
        codigo +
        "&nombre=" +
        nombre +
        "&precio_venta=" +
        precio_venta +
        "&stock=" +
        stock +
        "&descripcion=" +
        descripcion +
        "&imagen=" +
        imagen +
        "&estado=" +
        estado, 
      url: "modules/articulos/articulosController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          $("#formNuevoArticulo").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          alert("Articulo creado exitosamente");
          CargarContenido("modules/articulos/listadoArticulos.php");
        } else {
          alert("No se pudo crear el articulo");
        }
      },
    });
  });

  function eliminarArticulo(idarticulo) {
    $.ajax({
      type: "POST",
      data: "eliminar_articulo=1&art_id=" + idarticulo,
      url: "modules/articulos/articulosController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          alert("Articulo eliminado exitosamente");
          CargarContenido("modules/articulos/listadoArticulos.php");
        } else {
          alert("No se pudo eliminar el usuario seleccionado");
        }
      },
    });
  }
  