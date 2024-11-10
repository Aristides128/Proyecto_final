<?php
require_once '../../config/server_connection.php';
require_once '../../utils/paginador.php';
$query = "SELECT * FROM tbl_usuarios";

$paginador = new Paginador();
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
  $query .= " WHERE nombre_completo LIKE '%" . $_GET['buscar'] . "%'
  OR usuario LIKE '%" . $_GET['buscar'] . "%' 
  OR contrasena LIKE '%" . $_GET['buscar'] . "%'
  OR tipo_perfil LIKE '%" . $_GET['buscar'] . "%' 
  OR activo LIKE '%" . $_GET['buscar'] . "%' 
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
      <th scope="col">Nombre del Usuario</th>
      <th scope="col">Usuario</th>
      <th scope="col">Password</th>
      <th scope="col">Tipo de Perfil</th>
      <th scope="col">Activo</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paginador->registros_pagina as $Usuarios): ?>
      <!-- Ejemplo de Usuarios -->
      <tr style="text-align: left;">
        <td><?php echo $Usuarios['nombre_completo'] ?></td>
        <td><?php echo $Usuarios['usuario'] ?></td>
        <td><?php echo $Usuarios['contrasena'] ?></td>
        <td><?php echo $Usuarios['tipo_perfil'] ?></td>
        <td><?php echo $Usuarios['activo'] ?></td>
        <td class="text-right" style="text-align: right;">
          <a href="./form_detalles.php?id=<?php echo $Usuarios['id_usuario'] ?>">
            <button class="btn btn-s btn-outline-primary btn-action"
              data-bs-toggle="tooltip"
              title="Ver detalles">
              <i class="fas fa-eye"></i> Ver
            </button>
          </a>
          <a href="./form_editar.php?id=<?php echo $Usuarios['id_usuario'] ?>">
            <button class="btn btn-s btn-outline-success btn-action" data-bs-toggle="tooltip"
              title="Editar este Usuario">
              <i class="fas fa-edit"></i> Editar
            </button>
          </a>

          <button class="btn btn-s btn-outline-danger btn-action" data-bs-toggle="tooltip" onclick="eliminar(<?php echo $Usuarios['id_usuario'] ?>);"
            title="Eliminar este Usuario">
            <i class="fas fa-trash-alt"></i> Eliminar
          </button>
        </td>
      </tr>
  </tbody>
<?php endforeach; ?>

</table>