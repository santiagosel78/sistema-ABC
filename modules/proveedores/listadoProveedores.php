<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
    $proveedoresClass = new proveedoresClass();
    $resultadoProveedores = array();
    $resultadoProveedores = $proveedoresClass -> listadoProveedores();

    ob_end_flush();
?>
<div class = "container">
    <h1 class ="h2">LISTADO DE PROVEEDORES</h1>
  </div>
  <div class = "container">
    <div class = "d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-success " id = "btnNuevoProveedor" name = "btnNuevoProveedor" data-bs-toggle="modal" data-bs-target="#formNuevoProveedor">
        Nuevo Proveedor
      </button>
    </div>
    <div class = "table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DOCUMENTO</th>
                    <th scope="col">NUMERO</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                   while ($fila = mysqli_fetch_array($resultadoProveedores)){
                  ?>
                    <tr>
                      <td><?php echo $fila['idpersona']; ?></td>
                      <td><?php echo $fila['tipo_persona']; ?></td>
                      <td><?php echo $fila['nombre']; ?></td>
                      <td><?php echo $fila['tipo_documento']; ?></td>
                      <td><?php echo $fila['num_documento']; ?></td>
                      <td><?php echo $fila['direccion']; ?></td>
                      <td><?php echo $fila['telefono']; ?></td>
                      <td><?php echo $fila['email']; ?></td>
                      <td><button type="button" class="btn btn-warning " id = "btnEditarProveedor" name = "btnEditarProveedor" onclick = "editarProveedor(<?php echo $fila['idpersona'];?>);" data-bs-toggle="modal" data-bs-target="#fromEditarProveedor">EDITAR</button></td>
                      <td><button type="button" class="btn btn-danger " id = "btnEliminarProveedor" name = "btnEliminarProveedor" onclick = "eliminarProveedor(<?php echo $fila['idpersona'];?>);">ELIMINAR</button></td>
                    </tr>
                    <?php
                   }
                  ?>


                </tbody>
        </table>
    </div>
  </div>


<!-- Modal ag nuevo proveedor -->
<div class="modal fade" id="formNuevoProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="formNuevoProveedor">Nuevo Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <div class="form-floating mb-3">
          <select class="form-select" id = "tipo_persona" aria-label="Default select example">
            <option value="Proveedor">Proveedor</option>
          </select>
          <label for="role_id">Opcion Proveedor</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nombre" placeholder="Aqui el Nombre">
              <label for="nombre">Nombre</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tipo_documento" placeholder="Aqui va el tipo de Documento">
            <label for="tipo_documento">Tipo de documento</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="num_documento" placeholder="Aqui va el numero del documento">
              <label for="num_documento">Numero de documento</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="direccion" placeholder="Aqui va la direccion">
            <label for="direccion">Direccion</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="telefono" placeholder="Aqui va el telefono">
              <label for="telefono">Telefono</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" placeholder="Aqui va el correo">
            <label for="correo">Correo</label>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id = "btnAgregarProveedor">Agregar Proveedor</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal edit nuevo usuario -->

<div class="modal fade" id="fromEditarProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fromEditarUsuario">Modifica los campos que quieres editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="form-floating mb-3">
            <input class="form-control" type="text" id = "idpersona" placeholder="Disabled input" aria-label="Disabled input example" disabled>
            <label for="idpersona">ID</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_tipo_persona" placeholder="Disabled input" aria-label="Disabled input example" disabled>
            <label for="edit_tipo_persona">Tipo</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="edit_nombre">
              <label for="edit_nombre">Nombre</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_tipo_documento">
            <label for="edit_tipo_documento">Tipo de documento</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="edit_num_documento">
              <label for="edit_num_documento">Numero de documento</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="edit_direccion">
            <label for="edit_direccion">Direccion</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="edit_telefono">
              <label for="edit_telefono">Telefono</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="edit_email">
            <label for="edit_email">Correo</label>
          </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id = "btnConfirmEditarProveedor">Guardar cambios</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>


<script src="js/moduloProveedores.js"></script>
