<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background: linear-gradient(120deg, #f0f2f5, #d9e4f5);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .edit-container {
      width: 90%;
      max-width: 1000px;
      background-color: #fff;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
      animation: slideIn 0.7s ease;
    }
    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .edit-header {
      font-size: 2rem;
      font-weight: bold;
      color: #5a67d8;
      text-align: center;
      margin-bottom: 30px;
    }
    .form-label {
      font-weight: 600;
      color: #5a67d8;
    }
    .form-control, .form-select {
      border-radius: 8px;
      border-color: #d9e4f5;
      transition: box-shadow 0.3s;
    }
    .form-control:focus, .form-select:focus {
      box-shadow: 0 0 8px rgba(90, 103, 216, 0.3);
    }
    .btn-primary {
      background-color: #5a67d8;
      border: none;
      padding: 10px 20px;
      border-radius: 50px;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #4755b4;
    }
    .btn-secondary {
      color: #6c757d;
      background-color: #e9ecef;
      border: none;
      padding: 10px 20px;
      border-radius: 50px;
    }
    #preview {
      max-width: 100%;
      max-height: 200px;
      margin-top: 15px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="edit-container">
    <h2 class="edit-header">Editar Producto</h2>
    <form action="/guardar-producto" method="POST" enctype="multipart/form-data">
      <div class="row">
        <!-- Información básica -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-tag"></i></span>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="id_marca" class="form-label">Marca</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-star"></i></span>
              <select class="form-select" id="id_marca" name="id_marca" required>
                <option value="" disabled selected>Selecciona Marca</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-th-list"></i></span>
              <select class="form-select" id="id_categoria" name="id_categoria" required>
                <option value="" disabled selected>Selecciona Categoría</option>
              </select>
            </div>
          </div>
        </div>
        <!-- Información adicional -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="detalles" class="form-label">Detalles</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
              <textarea class="form-control" id="detalles" name="detalles" rows="3" placeholder="Detalles" required></textarea>
            </div>
          </div>
          <div class="mb-3">
            <label for="id_ubicacion_fisica" class="form-label">Ubicación Física</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              <select class="form-select" id="id_ubicacion_fisica" name="id_ubicacion_fisica" required>
                <option value="" disabled selected>Selecciona Ubicación Física</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <!-- Precios -->
        <div class="col-md-4">
          <label class="form-label">Precios de Venta</label>
          <div class="input-group mb-2">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" id="precio_venta1" name="precio_venta1" placeholder="Precio Venta 1" step="0.01" required>
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" id="precio_venta2" name="precio_venta2" placeholder="Precio Venta 2" step="0.01" required>
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" id="precio_venta3" name="precio_venta3" placeholder="Precio Venta 3" step="0.01" required>
          </div>
        </div>

        <!-- Códigos y existencias -->
        <div class="col-md-4">
          <div class="mb-3">
            <label for="existencias_minimas" class="form-label">Existencias Mínimas</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-box"></i></span>
              <input type="number" class="form-control" id="existencias_minimas" name="existencias_minimas" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="codigo_interno" class="form-label">Código Interno</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-code"></i></span>
              <input type="text" class="form-control" id="codigo_interno" name="codigo_interno" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="codigo_barras" class="form-label">Código de Barras</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-barcode"></i></span>
              <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" required>
            </div>
          </div>
        </div>

        <!-- Imagen y estado -->
        <div class="col-md-4">
          <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)">
            <img id="preview" src="#" alt="Vista previa" style="display: none;">
          </div>
          <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="activo" name="activo">
            <label class="form-check-label" for="activo">Activo</label>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary me-3">Guardar Cambios</button>
        <a href="index.html" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
  <script>
    function previewImage(event) {
      const preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0]);
      preview.style.display = 'block';
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
