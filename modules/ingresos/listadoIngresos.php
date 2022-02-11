<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
    $ingresosClass = new ingresosClass();
    $resultadoingresos = array();
    $resultadoingresos = $ingresosClass -> listadoIngresos();
    $resultadoProveedores = $ingresosClass -> getProveedores();
    $nuevoresultado = $ingresosClass -> getProveedores();
    $resultadoArticulos = $ingresosClass -> getArticulos();

    ob_end_flush();
?>
<div class = "container">
    <h1 class ="h2">LISTADO DE INGRESOS</h1>
  </div>
  <div class = "container">
    <div class = "d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-success " id = "btnNuevoIngreso" name = "btnNuevoIngreso" data-bs-toggle="modal" data-bs-target="#formNuevoIngreso">
        Nuevo Ingreso
      </button>
    </div>
    <div class = "table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PROVEEDOR</th>
                    <th scope="col">COMPROBANTE</th>
                    <th scope="col">SERIE</th>
                    <th scope="col">NUMERO</th>
                    <th scope="col">RECIBIO</th>
                    <th scope="col">ARTICULO</th>
                    <th scope="col">CAJAS</th>
                    <th scope="col">U./CAJA</th>
                    <th scope="col">TOTAL U.</th>
                    <th scope="col">PRECIO U.</th>
                    <th scope="col">IMPUESTO</th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>
                  </tr>
                </thead>
              <tbody>

                <?php
                   while ($fila = mysqli_fetch_array($resultadoingresos)){
                  ?>
                    <tr>
                      <td><?php echo $fila['idingreso']; ?></td>
                      <td><?php echo $fila['nombre']; ?></td>
                      <td><?php echo $fila['tipo_comprobante']; ?></td>
                      <td><?php echo $fila['serie_comprobante']; ?></td>
                      <td><?php echo $fila['num_comprobante']; ?></td>
                      <td><?php echo $fila['nombre_usr']; ?></td>
                      <td><?php echo $fila['nombre_art']; ?></td>
                      <td><?php echo $fila['caja']; ?></td>
                      <td><?php echo $fila['cantidad']; ?></td>
                      <td><?php echo $fila['total_c']; ?></td>
                      <td><?php echo $fila['precio']; ?></td>
                      <td><?php echo $fila['impuesto']; ?></td>
                      <td><?php echo $fila['total']; ?></td>
                      <td><?php echo $fila['fecha']; ?></td>
                      <td><button type="button" class="btn btn-warning " id = "btnEditarIngreso" name = "btnEditarIngreso" onclick = "editarIngreso(<?php echo $fila['idingreso'];?>);" data-bs-toggle="modal" data-bs-target="#fromEditarIngreso">EDITAR</button></td>
                      <td><button type="button" class="btn btn-danger " id = "btnEliminarIngreso" name = "btnEliminarIngreso" onclick = "eliminarIngreso(<?php echo $fila['idingreso'];?>);">ELIMINAR</button></td>
                    </tr>
                    <?php
                   }
                  ?>


              </tbody>
        </table>
    </div>
  </div>

 <!-- Modal ag nuevo Articulo -->
 <div class="modal fade" id="formNuevoIngreso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="formNuevoArticulo">Nuevo Articulo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <div class="form-floating mb-3">
          <select class="form-select" id = "idproveedor" aria-label="Default select example">
            <?php
            while ($row = mysqli_fetch_array($resultadoProveedores)){
            ?>
            <option value="<?php echo $row['idpersona'];?>"><?php echo $row['nombre'];?></option>
            <?php
            }
            ?>
          </select>
          <label for="idproveedor">Selecciona un Proveedor</label>
          </div>

          <div class="form-floating mb-3">
          <select class="form-select" id = "idarticulo" aria-label="Default select example">
            <?php
            while ($row = mysqli_fetch_array($resultadoArticulos)){
            ?>
            <option value="<?php echo $row['idarticulo'];?>"><?php echo $row['nombre'];?></option>
            <?php
            }
            ?>
          </select>
          <label for="idproveedor">Selecciona un Articulo</label>
          </div>


          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="idusuario" placeholder="Aqui el id usuario">
              <label for="idusuario">ID Usuario</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tipo_comprobante" placeholder="Aqui va el tipo de comprobante">
            <label for="tipo_comrprobante">Tipo de comprobante</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="serie_comprobante" placeholder="Aqui va la serie del comprobante">
              <label for="serie_comprobante">Serie comprobante</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="num_comprobante" placeholder="Aqui va el numero del comprobante">
            <label for="num_comprobante">Numero del Comprobante</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="caja" placeholder="Aqui va la cantidad de cajas">
              <label for="caja">No. Cajas</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="cantidad" placeholder="Aqui van las unidades por caja">
              <label for="cantidad">Unidades por caja</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="total_c" placeholder="Aqui el total de unidades">
              <label for="total_c">Total de Unidades</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="precio" placeholder="Aqui el precio por unidad">
              <label for="precio">Precio por unidad</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="impuesto" placeholder="Aqui va el impuesto">
            <label for="impuesto">Impuesto</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="total" placeholder="Aqui va el total">
            <label for="total">Precio Total</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="fecha" placeholder="Aqui va la fecha">
              <label for="fecha">Fecha</label>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id = "btnAgregarIngreso">Agregar Ingreso</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>


<script src="js/moduloIngresos2.js"></script>