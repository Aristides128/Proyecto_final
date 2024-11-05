<?php
require_once '../../config/server_connection.php';

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
  title: 'Error al registrar',
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

$conexion->query = "INSERT INTO tbl_usuarios (
nombre_completo,
usuario,
contrasena,
tipo_perfil,
activo
) VALUES (
'{$nombre_completo}',
'{$usuario}',
'{$contrasena}',
'{$tipo_perfil}',
'{$activo}'
)";
$conexion->execute_query();


echo "<script>
Swal.fire({
title: 'Usuario ingresado',
text: 'El usuario ha sido ingresado con éxito',
icon: 'success',
confirmButtonText: 'Aceptar',
timer: 3000
}).then(() => {
window.location.href = 'form_listar.php';
});
</script>";
