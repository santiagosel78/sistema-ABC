$("#btnAgregarUsuario").on("click", function () {
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  var edad = $("#edad").val();
  var usuario = $("#usuario").val();
  var clave = $("#clave").val();
  var dpi = $("#dpi").val();
  var correo = $("#email").val();
  var telefono = $("#telefono").val();
  var rol = $("#role_id").val();

  if (
    nombre == "" ||
    apellido == "" ||
    edad == "" ||
    usuario == "" ||
    clave == "" ||
    dpi == "" ||
    correo == "" ||
    telefono == "" ||
    rol == ""
  ) {
    alert("Todos los campos son obligatorios");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "crear_usuario=1&nombre=" +
      nombre +
      "&apellido=" +
      apellido +
      "&edad=" +
      edad +
      "&usuario=" +
      usuario +
      "&clave=" +
      clave +
      "&dpi=" +
      dpi +
      "&email=" +
      correo +
      "&telefono=" +
      telefono +
      "&role_id=" +
      rol,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        $("#formNuevoUsuario").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        alert("Usuario creado exitosamente");
        CargarContenido("modules/usuarios/listadoUsuarios.php");
      } else {
        alert("No se pudo crear el usuario");
      }
    },
  });
});

