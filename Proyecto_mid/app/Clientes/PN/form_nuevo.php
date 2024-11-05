<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Ferretería</title>
  <link rel="shortcut icon" href="../../../assets/images/logo.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../assets/css/estilo_agregar.css">
</head>
<body>

  <div class="container-fluid" style="padding-top: 10px;">
    <form name="form_nuevo" action="./proc_agregar.php" method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-3">
      <h1 class="titulo-bienvenida">Módulo de Clientes</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-outline-success" ><i class="bi bi-floppy-fill"></i> Guardar </button>
          <a href="form_listar.php" class="btn btn-outline-danger"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3 card-shadow">
        <div class="card-header"><center>Registro de Nuevo Cliente Tipo Persona Natural </center></div>
        <div class="card-body">

          <div class="row mb-3">
            <label for="nombre" class="col-2 col-form-label">Nombre Completo:</label>
            <div class="col-10">
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
          </div>
          <div class="row mb-3">
            <label for="genero" class="col-2 col-form-label">Género:</label>
            <div class="col-10">
              <select name="genero" id="genero">
              <option value="seleccione">Seleccione...</option>
                <option value="m">Masculino</option>
                <option value="f">Femenino</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="direccion" class="col-2 col-form-label">Dirección:</label>
            <div class="col-10">
              <textarea class="form-control" name="direccion" id="direccion"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="estadocivil" class="col-2 col-form-label">Estado Civil:</label>
            <div class="col-10">
              <select name="estadocivil" id="estadocivil">
                <option value="seleccione">Seleccione...</option>
                <option value="s">Soltero/a</option>
                <option value="c">Casado/a</option>
                <option value="d">Divorciado/a</option>
                <option value="v">Viudo/a</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="telefono" class="col-2 col-form-label">Teléfono:</label>
            <div class="col-10">
              <input type="text" class="form-control" name="telefono" id="telefono">
            </div>
          </div>

          <div class="row mb-3">
            <label for="dui" class="col-2 col-form-label">DUI:</label>
            <div class="col-10">
              <input type="text" class="form-control" name="dui" id="dui">
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
        title: 'Ingrese el nombre del cliente',
        showConfirmButton: true,
        timer: 3000
      })
    } else if (!document.getElementById('direccion').value) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Ingrese la dirección del cliente',
        showConfirmButton: true,
        timer: 3000
      })
    } else {
      document.forms.form_nuevo.submit();
    }
  }
</script>