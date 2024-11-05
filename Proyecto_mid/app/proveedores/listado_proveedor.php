<?php
require_once '../../config/server_connection.php';
require_once '../../utils/paginador.php';
$query = "SELECT * FROM tbl_proveedores";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR tipo_proveedor LIKE '%" . $_GET['buscar'] . "%' 
  OR direccion LIKE '%" . $_GET['buscar'] . "%'
  OR telefono LIKE '%" . $_GET['buscar'] . "%' 
  OR dui LIKE '%" . $_GET['buscar'] . "%' 
  OR nit LIKE '%" . $_GET['buscar'] . "%' 
  OR giro LIKE '%" . $_GET['buscar'] . "%' 
  OR fecha_registro LIKE '%" . $_GET['buscar'] . "%' 
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
      <th scope="col">Nombre del Proveedor</th>
      <th scope="col">Tipo de Proveedor</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Giro</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paginador->registros_pagina as $Proveedores): ?>
      <!-- Ejemplo de Clientes -->
      <tr style="text-align: left;">
        <td><?php echo $Clientes['nombre'] ?></td>
        <td><?php echo $Clientes['tipo_proveedor'] ?></td>
        <td><?php echo $Clientes['direccion'] ?></td>
        <td><?php echo $Clientes['telefono'] ?></td>
        <td><?php echo $Clientes['giro'] ?></td>
        <td class="text-right" style="text-align: right;">
          <button class="btn btn-s btn-outline-primary btn-action"
            data-bs-toggle="tooltip"
            title="Ver detalles">
            <i class="fas fa-eye"></i> Ver
          </button>
          <button class="btn btn-s btn-outline-success btn-action" data-bs-toggle="tooltip"
            title="Editar este Cliente">
            <i class="fas fa-edit"></i> Editar
          </button>
          <button class="btn btn-s btn-outline-danger btn-action" data-bs-toggle="tooltip"
            title="Eliminar este Cliente">
            <i class="fas fa-trash-alt"></i> Eliminar
          </button>
        </td>
      </tr>
  </tbody>
<?php endforeach; ?>

</table>