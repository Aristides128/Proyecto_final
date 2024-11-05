<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Ferretería</title>
  <link rel="shortcut icon" href="../../assets/images/logo.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/estilo_agregar.css">
</head>
<body>

  <div class="container-fluid" style="padding-top: 10px;">
    <form name="form_nuevo" action="./proc_agregar.php" method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-3">
      <h1 class="titulo-bienvenida" style="font-size: 30px;">Módulo de Servicios</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-outline-success" ><i class="bi bi-floppy-fill"></i> Guardar </button>
          <a href="form_listar.php" class="btn btn-outline-danger"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3 card-shadow">
        <div class="card-header"><center>Registro de Nuevos Servicios</center></div>
        <div class="card-body">

          <div class="row mb-3">
            <label for="nombre" class="col-2 col-form-label">Nombre:</label>
            <div class="col-10">
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
          </div>
          <div class="row mb-3">
            <label for="precio_venta1" class="col-2 col-form-label">Precio Venta 1:</label>
            <div class="col-10">
              <input type="number" class="form-control" name="precio_venta1" id="precio_venta1">
            </div>
          </div>

          <div class="row mb-3">
            <label for="precio_venta2" class="col-2 col-form-label">Precio Venta 2:</label>
            <div class="col-10">
              <input type="number" class="form-control" name="precio_venta2" id="precio_venta2">
            </div>
          </div>

          <div class="row mb-3">
            <label for="precio_venta3" class="col-2 col-form-label">Precio Venta 3:</label>
            <div class="col-10">
              <input type="number" class="form-control" name="precio_venta3" id="precio_venta3">
            </div>
          </div>

        </div>
      </div>
    </form>
  </div>

</body>
</html>

<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script>
  function validar_nuevo() {
    if (!document.getElementById('nombre').value) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Ingrese el nombre del servicio',
        showConfirmButton: true,
        timer: 3000
      })
    } else if (!document.getElementById('precio_venta1').value) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Ingrese el precio de venta',
        showConfirmButton: true,
        timer: 3000
      })
    } else {
      document.forms.form_nuevo.submit();
    }
  }
</script>