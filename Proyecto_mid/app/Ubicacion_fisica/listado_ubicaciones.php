<?php
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_ubicaciones_fisicas";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR id_ubicacion_fisica LIKE '%" . $_GET['buscar'] . "%' 
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
      <th scope="col">Nombre de la Ubicacion fisica</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <?php foreach ($paginador->registros_pagina as $Ubicacion): ?>
    <tbody>
      <!-- Ejemplo de Ubicaciones fisicas -->
      <tr>
        <td style="text-align: left;"><?php echo $Ubicacion['nombre'] ?></td>
        <td class="text-right" align="right">
          <button class="btn btn-s btn-outline-primary btn-action"
            onclick="verDetallesUbicacion(<?php echo (int)$Ubicacion['id_ubicacion_fisica']; ?>, '<?php echo addslashes($Ubicacion['nombre']); ?>')"
            data-bs-toggle="tooltip"
            title="Ver detalles">
            <i class="fas fa-eye"></i> Ver
          </button>
          <button class="btn btn-s btn-outline-success btn-action" data-bs-toggle="tooltip" 
            onclick="mostrarModalEditar(<?php echo (int)$Ubicacion['id_ubicacion_fisica']; ?>,'<?php echo addslashes($Ubicacion['nombre']) ?>')" title="Editar esta Ubicacion">
            <i class="fas fa-edit"></i> Editar
          </button>
          <button class="btn btn-s btn-outline-danger btn-action" data-bs-toggle="tooltip" onclick="eliminar(<?php echo (int)$Ubicacion['id_ubicacion_fisica']; ?>)"
            title="Eliminar esta Ubicacion">
            <i class="fas fa-trash-alt"></i> Eliminar
          </button>
        </td>
      </tr>
    </tbody>
  <?php endforeach; ?>
</table>
</div>