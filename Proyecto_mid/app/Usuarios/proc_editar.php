<?php
require_once '../../config/server_connection.php';

$id_usuario = @$_REQUEST['id_usuario'];
$nombre_completo = @$_REQUEST['nombre_completo'];
$usuario = @$_REQUEST['usuario'];
$contrasena = @$_REQUEST['contrasena'];
$tipo_perfil = @$_REQUEST['tipo_perfil'];
$activo = @$_REQUEST['activo'];

$campos = [$nombre_completo, $usuario, $contrasena, $tipo_perfil, $activo,];


foreach ($campos as $variables) {
  if (empty($variables)) {
    echo "<script>
  Swal.fire({
  title: 'Error al editar',
  text: 'Todos los campos son obligatorios',
  icon: 'error',
  confirmButtonText: 'Aceptar',
  }).then(() => {
  window.location.href = 'form_listar.php';
  });
  </script>
  ";
    exit();
  }
}
$conexion = new ServerConnection();

$conexion->query = "UPDATE tbl_usuarios SET
nombre_completo = '{$nombre_completo}',
usuario = '{$usuario}',
contrasena = '{$contrasena}',
tipo_perfil = '{$tipo_perfil}',
activo = '{$activo}'
WHERE id_usuario = '{$id_usuario}'
";

$conexion->execute_query();

echo "<script>
Swal.fire({
title: 'Usuario editado',
text: 'El usuario ha sido editado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";
