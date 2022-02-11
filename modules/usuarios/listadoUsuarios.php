<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  $usuariosClass = new usuariosClass();
  $resultado = array();
  $resultadoRoles = array();
  $resultado = $usuariosClass -> listadoUsuarios();
  $resultadoRoles = $usuariosClass -> getRoles();
  $nuevoresultado = $usuariosClass -> getRoles();

  ob_end_flush();
?>
  <div class = "container">
    <h1 class ="h2">LISTADO DE USUARIOS</h1>
  </div>
  <div class = "container">
    <div class = "d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-success " id = "btnNuevoUsuario" name = "btnNuevoUsuario" data-bs-toggle="modal" data-bs-target="#formNuevoUsuario">
        Nuevo Usuario
      </button>
    </div>
    <div class = "table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Dpi</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                   while ($fila = mysqli_fetch_array($resultado)){
                  ?>
                    <tr>
                      <td><?php echo $fila['id']; ?></td>
                      <td><?php echo $fila['nombre']." ".$fila['apellido']; ?></td>
                      <td><?php echo $fila['edad']; ?></td>
                      <td><?php echo $fila['usuario']; ?></td>
                      <td><?php echo $fila['clave']; ?></td>
                      <td><?php echo $fila['dpi']; ?></td>
                      <td><?php echo $fila['email']; ?></td>
                      <td><?php echo $fila['telefono']; ?></td>
                      <td><?php echo $fila['nombre_rol']; ?></td>
                      <td><?php echo $fila['estado']; ?></td>
                    </tr>
                    <?php
                   }
                  ?>


                </tbody>
        </table>
    </div>
  </div>


<!-- Modal ag nuevo usuario -->
<div class="modal fade" id="formNuevoUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="formNuevoUsuario">Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" placeholder="Aqui va tu nombre">
            <label for="nombre">Nombre</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="apellido" placeholder="Aqui va tu apellido">
              <label for="apellido">Apellido</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="edad" placeholder="Aqui va tu edad">
            <label for="edad">Edad</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="usuario" placeholder="Aqui va tu usuario">
              <label for="usuario">Usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="clave" placeholder="Aqui va tu clave">
            <label for="clave">Clave</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="dpi" placeholder="Aqui va tu DPI">
              <label for="dpi">DPI</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Aqui va tu correo">
            <label for="correo">Correo</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="telefono" placeholder="Aqui va tu correo">
            <label for="telefono">Teléfono</label>
          </div>
          <div class="form-floating mb-3">
          <select class="form-select" id = "role_id" aria-label="Default select example">
            <?php
            while ($row = mysqli_fetch_array($resultadoRoles)){
            ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
            <?php
            }
            ?>
          </select>
          <label for="role_id">Selecciona un rol</label>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id = "btnAgregarUsuario">Agregar Usuario</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>



<script src="js/moduloUsuarios6.js"></script>