<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Formulario agregar personas Juridicas</title>
  <link rel="shortcut icon" href="../../assets/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../assets/css/estilo_formularios.css">
</head>

<body>
  <div class="container mt-5">
    <form name="form_nuevo" action="./proc_agregar_persona_juridica.php" method="post" autocomplete="off">
      <div class="d-flex align-items-center mb-4">
        <h1 class="fw-bold" style="font-size: 28px; color: #495057; border-bottom: 2px solid #495057;">Módulo De Personas Juridicas</h1>
        <div class="ms-auto">
          <button type="submit" class="btn btn-agregar me-2"><i class="bi bi-floppy-fill"></i> Guardar</button>
          <a href="./form_listar_todos.php" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas cancelar?')"><i class="bi bi-x-square-fill"></i> Cancelar</a>
        </div>
      </div>

      <div class="card card-custom p-4">
        <div class="form-section">
          <div class="form-section-title">Información Personal</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo" required>
                <label for="nombre"><i class="bi bi-person-fill me-2"></i>Nombre Completo</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Contacto -->
        <div class="form-section highlight">
          <div class="form-section-title">Información de Contacto</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección" style="height: 100px;" required></textarea>
                <label for="direccion"><i class="bi bi-geo-alt-fill me-2"></i>Dirección</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required pattern="^[0-9]{8}$">
                <label for="telefono"><i class="bi bi-telephone-fill me-2"></i>Teléfono</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección Documentación -->
        <div class="form-section">
          <div class="form-section-title">Documentación</div>
          <div class="row g-3">
           
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT" required maxlength="17">
                <label for="nit"><i class="bi bi-file-earmark-text-fill me-2"></i>NIT</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="nrc" name="nrc" placeholder="NRC" required>
                <label for="nrc"><i class="bi bi-briefcase-fill me-2"></i>NRC</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="giro" name="giro" placeholder="Giro" required>
                <label for="giro"><i class="bi bi-building me-2"></i>Giro</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
