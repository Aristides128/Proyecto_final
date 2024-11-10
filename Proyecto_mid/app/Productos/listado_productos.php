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
<style>
  
</style>
<div class="row g-3">
  <?php echo $paginador->mostrar_paginador(); ?>
  <br>
  <?php foreach ($paginador->registros_pagina as $Productos): ?>
    <div class="col-12 col-md-4">
      <div class="card card-custom h-100 shadow-sm">
        <div class="ratio ratio-4x3" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
          <img src="<?php echo $Productos['imagen']; ?>" alt="Imagen del Producto" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;">
        </div>
        <div class="card-body d-flex flex-column">
          <h5 class="card-title fs-6 text-dark"><?php echo $Productos['nombre']; ?></h5>
          <p class="card-text fs-6 text-muted mb-3"><?php echo substr($Productos['detalles'], 0, 60) . '...'; ?></p>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownPrecios<?php echo $Productos['id_producto']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                Ver Precios
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownPrecios<?php echo $Productos['id_producto']; ?>" style="min-width: 150px;">
                <li><span class="dropdown-item"><strong>Precio 1:</strong> $<?php echo number_format($Productos['precio_venta1'], 2); ?></span></li>
                <li><span class="dropdown-item"><strong>Precio 2:</strong> $<?php echo number_format($Productos['precio_venta2'], 2); ?></span></li>
                <li><span class="dropdown-item"><strong>Precio 3:</strong> $<?php echo number_format($Productos['precio_venta3'], 2); ?></span></li>
              </ul>
            </div>
            <span class="badge bg-<?php echo $Productos['activo'] ? 'success' : 'danger'; ?>">
              <?php echo $Productos['activo'] ? 'Disponible' : 'Agotado'; ?>
            </span>
          </div>

          <div class="mt-auto d-flex justify-content-start flex-wrap gap-2">
            <a href="./form_detalles.php?id=<?php echo $Productos['id_producto'] ?>">
              <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="Ver Detalles">
                <i class="bi bi-eye"></i> Ver
              </button>
            </a>
            <a href="./form_editar.php?id=<?php echo $Productos['id_producto'] ?>">
              <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Editar este Producto">
                <i class="bi bi-pencil"></i> Editar
              </button>
            </a>
            <button class="btn btn-sm btn-outline-danger" onclick="eliminar(<?php echo $Productos['id_producto'] ?>);" data-bs-toggle="tooltip" title="Eliminar Este Producto">
              <i class="bi bi-trash"></i> Eliminar
            </button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
