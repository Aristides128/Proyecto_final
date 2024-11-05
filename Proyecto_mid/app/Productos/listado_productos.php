<?php
require_once '../.././config/server_connection.php';
require_once '../.././utils/paginador.php';
$query = "SELECT * FROM tbl_productos";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre LIKE '%" . $_GET['buscar'] . "%'
  OR detalles LIKE '%" . $_GET['buscar'] . "%' 
  ";
}
$paginador->query = $query;
$paginador->registros_por_pag = 12;
$paginador->pag_actual = isset($_GET['pa']) ? (int)$_GET['pa'] : 1;
$paginador->destino = 'form_listar.php';
$paginador->crear_paginador();

?>

<!-- Contenedor de la fila -->
<div class="row g-3">
  <?php echo $paginador->mostrar_paginador(); ?>
  <br>
  <!-- Listado de elementos -->
  <?php foreach ($paginador->registros_pagina as $Productos): ?>
    <!-- Card Item -->
    <div class="col-12 col-md-4">
      <div class="card h-100 border-0 shadow-sm rounded-3">
        <!-- Contenedor de la imagen -->
        <div class="ratio ratio-4x3" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
          <img src="<?php echo $Productos['imagen']; ?>" alt="Imagen del Producto" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
        </div>
        <!-- Contenido de la tarjeta -->
        <div class="card-body d-flex flex-column">
          <h5 class="card-title fs-5 text-primary"><?php echo $Productos['nombre']; ?></h5>
          <p class="card-text fs-6 text-muted"><?php echo substr($Productos['detalles'], 0, 86) ?></p>
          <div class="mt-auto">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge bg-primary">Categoría</span>
              <span class="badge bg-secondary">Marca</span>
            </div>
            <div class="d-flex justify-content-start flex-wrap gap-2">
              <button class="btn btn-sm btn-outline-primary" onclick="location.href='./detalles.php'" data-bs-toggle="tooltip" title="Ver Detalles" data-bs-placement="left">
                <i class="bi bi-eye"></i> Ver
              </button>
              <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Editar este Producto" data-bs-placement="left">
                <i class="bi bi-pencil"></i> Editar
              </button>
              <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Eliminar Este Producto" data-bs-placement="left">
                <i class="bi bi-trash"></i> Eliminar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>