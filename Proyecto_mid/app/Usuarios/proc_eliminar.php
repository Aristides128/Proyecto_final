<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
  
</body>

<?php
require_once '../../config/server_connection.php';

$id_usuario = @$_REQUEST['id'];

if ($id_usuario == ' ') {
  echo "<script>
  Swal.fire({
  title: 'Error al eliminar',
  text: 'No se ha encontrado ningun cliente',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  timer: 3000
  }).then(() => {
  window.location.href = 'form_listar.php';
  });
  </script>
  ";
  exit();
}

$conexion = new ServerConnection();

$conexion->query = "DELETE FROM tbl_usuarios WHERE id_usuario =  '{$id_usuario}'";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Usuario eliminado',
text: 'El usuario ha sido eliminado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";
