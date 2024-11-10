<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

</body>

<?php
require_once '../../config/server_connection.php';

$nombre = @$_REQUEST['nombredo'];

if ($nombre == '') {
  echo "<script>
  Swal.fire({
  title: 'Error al agregar',
  text: 'El campo de agregar no puede ir vacio',
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
$conexion->query = "INSERT INTO tbl_documentos_fiscales (nombre) 
    VALUES (
        '$nombre')";

$conexion->execute_query();

echo "<script>
    Swal.fire({
    title: 'Documento Fiscal ingresado',
    text: 'El Documento ha sido ingresado con éxito',
    icon: 'success',
    confirmButtonText: 'Aceptar',
    timer: 3000
    }).then(() => {
    window.location.href = 'form_listar.php';
    });
</script>";

?>