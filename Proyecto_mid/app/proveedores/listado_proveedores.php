<?php
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_proveedores";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR tipo_proveedor LIKE '%" . $_GET['buscar'] . "%' 
  OR direccion LIKE '%" . $_GET['buscar'] . "%'
  OR telefono LIKE '%" . $_GET['buscar'] . "%' 
  OR tiene_percepcion LIKE '%" . $_GET['buscar'] . "%' 
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
      <th scope="col">percepcion</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paginador->registros_pagina as $Proveedores): ?>
      <!-- Ejemplo de Proveedores -->
      <tr style="text-align: left;">
        <td><?php echo $Proveedores['nombre'] ?></td>
        <td><?php echo $Proveedores['tipo_proveedor'] ?></td>
        <td><?php echo $Proveedores['direccion'] ?></td>
        <td><?php echo $Proveedores['telefono'] ?></td>
        <td><?php echo $Proveedores['tiene_percepcion'] ?></td>
        <td class="text-right" style="text-align: right;">
          <a href="./form_detalles.php?id=<?php echo $Proveedores['id_proveedor'] ?>">
            <button class="btn btn-s btn-outline-primary btn-action"
              data-bs-toggle="tooltip"
              title="Ver detalles">
              <i class="fas fa-eye"></i> Ver
            </button>
          </a>
          <a href="./form_editar.php?id=<?php echo $Proveedores['id_proveedor'] ?>">
            <button class="btn btn-s btn-outline-success btn-action" data-bs-toggle="tooltip"
              title="Editar este Proveedor">
              <i class="fas fa-edit"></i> Editar
            </button>
          </a>
          <button class="btn btn-s btn-outline-danger btn-action" data-bs-toggle="tooltip"
            title="Eliminar este Proveedor" onclick="eliminar(<?php echo $Proveedores['id_proveedor'] ?>);">
            <i class="fas fa-trash-alt"></i> Eliminar
          </button>
        </td>
      </tr>
  </tbody>
<?php endforeach; ?>

</table>