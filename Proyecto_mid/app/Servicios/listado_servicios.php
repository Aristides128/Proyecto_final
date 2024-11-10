<?php
require_once '../../config/server_connection.php';
require_once '../../utils/paginador.php';
$query = "SELECT * FROM tbl_servicios";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR precio_venta1 LIKE '%" . $_GET['buscar'] . "%' 
  OR precio_venta2 LIKE '%" . $_GET['buscar'] . "%'
  OR precio_venta3 LIKE '%" . $_GET['buscar'] . "%' 
  ";
}
$paginador->query = $query;
$paginador->registros_por_pag = 5;
$paginador->pag_actual = isset($_GET['pa']) ? (int)$_GET['pa'] : 1;
$paginador->destino = 'form_listar.php';
$paginador->crear_paginador();

?>
<?php echo $paginador->mostrar_paginador(); ?>
<br>

<table class="table table-striped table-hover align-middle" style="text-align: center;">
  <thead class="table-light">
    <tr>
      <th scope="col">Nombre del Servicio</th>
      <th scope="col">Precio Venta 1</th>
      <th scope="col">Precio Venta 2</th>
      <th scope="col">Precio Venta 3</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paginador->registros_pagina as $Servicios): ?>
      <!-- Ejemplo -->
      <tr style="text-align: left;">
        <td><?php echo $Servicios['nombre'] ?></td>
        <td><?php echo $Servicios['precio_venta1'] ?></td>
        <td><?php echo $Servicios['precio_venta2'] ?></td>
        <td><?php echo $Servicios['precio_venta3'] ?></td>
        <td class="text-right" style="text-align: right;">
          <a href="./form_detalles.php?id=<?php echo $Servicios['id_servicio'] ?>">
          <button class="btn btn-s btn-outline-primary btn-action"
            data-bs-toggle="tooltip"
            title="Ver detalles">
            <i class="fas fa-eye"></i> Ver
          </button>
          </a>
          <a href="./form_editar.php?id=<?php echo $Servicios['id_servicio'] ?>"> 
          <button class="btn btn-s btn-outline-success btn-action" data-bs-toggle="tooltip"
            title="Editar este Cliente">
            <i class="fas fa-edit"></i> Editar
          </button>
          </a>
          <button class="btn btn-s btn-outline-danger btn-action" data-bs-toggle="tooltip"
          onclick="eliminar(<?php echo $Servicios['id_servicio'] ?>);"
            title="Eliminar este Cliente">
            <i class="fas fa-trash-alt"></i> Eliminar
          </button>
        </td>
      </tr>
  </tbody>
<?php endforeach; ?>

</table>