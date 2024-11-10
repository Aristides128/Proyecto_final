<?php
require_once '../../config/server_connection.php';
require_once '../../utils/paginador.php';
$query = "SELECT * FROM tbl_clientes";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR tipo_cliente LIKE '%" . $_GET['buscar'] . "%' 
  OR direccion LIKE '%" . $_GET['buscar'] . "%'
  OR telefono LIKE '%" . $_GET['buscar'] . "%' 
  OR dui LIKE '%" . $_GET['buscar'] . "%' 
  OR nit LIKE '%" . $_GET['buscar'] . "%' 
  OR giro LIKE '%" . $_GET['buscar'] . "%' 
  OR fecha_registro LIKE '%" . $_GET['buscar'] . "%' 
  ";
}
$paginador->query = $query;
$paginador->registros_por_pag = 7;
$paginador->pag_actual = isset($_GET['pa']) ? (int)$_GET['pa'] : 1;
$paginador->destino = 'form_listar_todos.php';
$paginador->crear_paginador();

?>
<?php echo $paginador->mostrar_paginador(); ?>
<br>

<table class="table table-striped table-hover align-middle" style="text-align: center;">
  <thead class="table-light">
    <tr>
      <th scope="col">Nombre del Cliente</th>
      <th scope="col">Tipo de cliente</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paginador->registros_pagina as $Clientes): ?>
      <!-- Ejemplo de Clientes -->
      <tr style="text-align: left;">
        <td><?php echo $Clientes['nombre'] ?></td>
        <td><?php echo $Clientes['tipo_cliente'] ?></td>
        <td><?php echo $Clientes['direccion'] ?></td>
        <td><?php echo $Clientes['telefono'] ?></td>
      </tr>
  </tbody>
<?php endforeach; ?>

</table>