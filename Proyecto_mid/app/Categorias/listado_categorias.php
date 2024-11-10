<?php 
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_categorias";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR id_categoria LIKE '%" . $_GET['buscar'] . "%' 
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
      <th scope="col" >Nombre de la Categoría</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <?php foreach ($paginador->registros_pagina as $Categoria): ?>
    <tbody>
      <!-- Ejemplo de categoría -->
      <tr>
        <td style="text-align: left;"><?php echo $Categoria['nombre'] ?></td>
        <td class="text-right" align="right">
          <button class="btn btn-s btn-outline-primary btn-action"
            onclick="verDetallesCategoria(<?php echo (int)$Categoria['id_categoria']; ?>, '<?php echo addslashes($Categoria['nombre']); ?>')"
            data-bs-toggle="tooltip"
            title="Ver detalles">
            <i class="fas fa-eye"></i> Ver
          </button>
          <button class="btn btn-s btn-outline-success btn-action" data-bs-toggle="tooltip"
            onclick="mostrarModalEditar(<?php echo (int)$Categoria['id_categoria']; ?>,'<?php echo addslashes($Categoria['nombre']) ?>')" title="Editar esta categoría">
            <i class="fas fa-edit"></i> Editar
          </button>
          <button class="btn btn-s btn-outline-danger btn-action" data-bs-toggle="tooltip" onclick="eliminar(<?php echo (int)$Categoria['id_categoria']; ?>)"
            title="Eliminar esta categoría">
            <i class="fas fa-trash-alt"></i> Eliminar
          </button>
        </td>
      </tr>
    </tbody>
  <?php endforeach; ?>
</table>
</div>
