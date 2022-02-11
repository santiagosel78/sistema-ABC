$("#btnAgregarCliente").on("click", function () {
    var tipo = $("#tipo_persona").val();
    var nombre = $("#nombre").val();
    var documento = $("#tipo_documento").val();
    var numero = $("#num_documento").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();
    var correo = $("#email").val();
  
    if (
      tipo == "" ||
      nombre == "" ||
      documento == "" ||
      numero == "" ||
      direccion == "" ||
      telefono == "" ||
      correo == ""
    ) {
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:
        "crear_cliente=1&tipo_persona=" +
        tipo +
        "&nombre=" +
        nombre +
        "&tipo_documento=" +
        documento +
        "&num_documento=" +
        numero +
        "&direccion=" +
        direccion +
        "&telefono=" +
        telefono +
        "&email=" +
        correo,
      url: "modules/clientes/clientesController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          $("#formNuevoCliente").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          alert("Cliente creado exitosamente");
          CargarContenido("modules/clientes/listadoClientes.php");
        } else {
          alert("No se pudo crear el cliente");
        }
      },
    });
  });

  function eliminarCliente(idpersona) {
    $.ajax({
      type: "POST",
      data: "eliminar_cliente=1&cli_id=" + idpersona,
      url: "modules/clientes/clientesController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          alert("Cliente eliminado exitosamente");
          CargarContenido("modules/clientes/listadoClientes.php");
        } else {
          alert("No se pudo eliminar el cliente seleccionado");
        }
      },
    });
  }

  function editarCliente(idpersona) {
    parametros = {
      editar_cliente: 1,
      cli_id: idpersona,
    };
    $.ajax({
      type: "POST",
      data: parametros,
      url: "modules/clientes/clientesController.php",
      dataType: "json",
      beforeSend: function(){},
      success: function (respuesta) {
        //datos = toString(respuesta);
        datos = respuesta;
        console.log(datos);
        if (datos.length > 0) {
          $('#id_persona').val(datos[0]['idpersona']);
          $('#edit_tipo_persona').val(datos[0]['tipo_persona']);
          $('#edit_nombre').val(datos[0]['nombre']);
          $('#edit_tipo_documento').val(datos[0]['tipo_documento']);
          $('#edit_num_documento').val(datos[0]['num_documento']);
          $('#edit_direccion').val(datos[0]['direccion']);
          $('#edit_telefono').val(datos[0]['telefono']);
          $('#edit_email').val(datos[0]['email']);
        }
        else{
            console.log('error');
            alert('error al editar cliente');
        }
      },
    });
  }
  
  $("#btnConfirmEditarCliente").on("click", function () {
    let idpersona = $("#idpersona").val();
    let tipo_persona = $("#edit_tipo_persona").val();
    let nombre = $("#edit_nombre").val();
    let tipo_documento = $("#edit_tipo_documento").val();
    let num_documento = $("#edit_num_documento").val();
    let direccion = $("#edit_direccion").val();
    let telefono = $("#edit_telefono").val();
    let correo = $("#edit_email").val();
  
    if (
      idpersona == "" ||
      tipo_persona == "" ||
      nombre == "" ||
      tipo_documento == "" ||
      num_documento == "" ||
      direccion == "" ||
      telefono == "" ||
      correo == ""
    ) {
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:
        "confirmar_modificacion=1&idpersona="+
        idpersona +
        "&tipo_persona=" +
        tipo_persona +
        "&nombre=" +
        nombre +
        "&tipo_documento=" +
        tipo_documento +
        "&num_documento=" +
        num_documento +
        "&direccion=" +
        direccion +
        "&telefono=" +
        telefono +
        "&email=" +
        correo,
      url: "modules/clientes/clientesController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado == 1) {
          $("#fromEditarCliente").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          alert("Cliente editado exitosamente");
          CargarContenido("modules/clientes/listadoClientes.php");
        } else {
          alert("No se pudo editar el cliente");
        }
      },
    });
  });