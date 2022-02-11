<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  $articulosClass = new articulosClass();
  $resultado = array();
  $resultadoRoles = array();
  $resultado = $articulosClass -> listadoArticulos();
  $resultadoCategorias = $articulosClass -> getCategorias();
  $nuevoresultado = $articulosClass -> getCategorias();

  ob_end_flush();
?>
  <div class = "container">
    <h1 class ="h2">LINEA DE PRODUCTOS</h1>
  </div>
  <div class = "container">
    <div class = "d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-success " id = "btnNuevoArticulo" name = "btnNuevoUsuario" data-bs-toggle="modal" data-bs-target="#formNuevoArticulo">
        NUEVO ARTICULO
      </button>
    </div>
    <div class = "table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">ID</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">PRECIO DE VENTA</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">DESCRIPCION</th>
                    
                    <th scope="col">ESTADO</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                   while ($fila = mysqli_fetch_array($resultado)){
                  ?>
                    <tr>
                      <td> <img src="data:image/png;base64,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" width='80' height = '45'/> </td>
                      <td><?php echo $fila['idarticulo']; ?></td>
                      <td><?php echo $fila['nombre_cat']; ?></td>
                      <td><?php echo $fila['codigo']; ?></td>
                      <td><?php echo $fila['nombre_art']; ?></td>
                      <td><?php echo $fila['precio_venta']; ?></td>
                      <td><?php echo $fila['stock']; ?></td>
                      <td><?php echo $fila['descripcion']; ?></td>
                      
                      <td><?php echo $fila['estado']; ?></td>
                      <td><button type="button" class="btn btn-warning " id = "btnEditarArticulo" name = "btnEditarArticulo" onclick = "editarArticulo(<?php echo $fila['idarticulo'];?>);" data-bs-toggle="modal" data-bs-target="#fromEditarUsuario">EDITAR</button></td>
                      <td><button type="button" class="btn btn-danger " id = "btnEliminarArticulo" name = "btnEliminarArticulo" onclick = "eliminarArticulo(<?php echo $fila['idarticulo'];?>);">ELIMINAR</button></td>
                    </tr>
                    <?php
                   }
                  ?>


                </tbody>
        </table>
    </div>
  </div>


  <!-- Modal ag nuevo Articulo -->
<div class="modal fade" id="formNuevoArticulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="formNuevoArticulo">Nuevo Articulo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <div class="form-floating mb-3">
          <select class="form-select" id = "id_categoria_art" aria-label="Default select example">
            <?php
            while ($row = mysqli_fetch_array($resultadoCategorias)){
            ?>
            <option value="<?php echo $row['idcategoria'];?>"><?php echo $row['nombre'];?></option>
            <?php
            }
            ?>
          </select>
          <label for="id_categoria">Selecciona una categoria</label>
          </div>

          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="codigo_art" placeholder="Aqui el codigo">
              <label for="codigo">Codigo</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre_art" placeholder="Aqui va el nombre">
            <label for="nombre">Nombre</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="precio_venta_art" placeholder="Aqui va el precio del producto">
              <label for="precio_venta">Precio de Venta</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="stock_art" placeholder="Aqui va la cantidad en Stock">
            <label for="stock">Stock</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="descripcion_art" placeholder="Aqui va la descripcion">
              <label for="descripcion">Descripcion</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="imagen_art" placeholder="Aqui va una imagen">
            <label for="imagen">Imagen</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="estado_art" placeholder="Aqui va 1 - 0">
            <label for="estado">Estado</label>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id = "btnAgregarArticulo">Agregar Articulo</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>



<script src="js/moduloArticulos.js"></script>