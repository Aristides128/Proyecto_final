<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Elementos en Categoría</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-element {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
      height: 300px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card-element:hover {
      transform: translateY(-5px);
    }

    .list-header {
      font-weight: 700;
      color: #343a40;
      margin-bottom: 20px;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
      color: #212529;
    }

    .price-tag {
      font-size: 1.1rem;
      font-weight: 700;
      color: #28a745;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center list-header">Elementos de la Categoría "Construcción"</h2>

    <!-- Barra de búsqueda -->
    <div class="input-group mb-4">
      <input type="text" class="form-control" placeholder="Buscar elementos..." aria-label="Buscar elementos" aria-describedby="button-buscar">
      <button class="btn btn-primary" type="button" id="button-buscar">Buscar</button>
    </div>

    <!-- Listado de elementos -->
    <div class="row">
      <!-- Card de Elemento -->
      <div class="col-md-4 mb-4">
        <div class="card card-element">
          <div class="card-body">
            <h5 class="card-title">Nombre del Elemento 1</h5>
            <p class="card-text">Descripción breve del elemento. Proporciona detalles relevantes para ayudar a los usuarios a conocer más sobre el producto.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price-tag">$15.99</span>
              <a href="./detalles.php"><button class="btn btn-sm btn-outline-primary">Ver Detalles</button></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Duplicar este bloque para más elementos -->
      <div class="col-md-4 mb-4">
        <div class="card card-element">
          <div class="card-body">
            <h5 class="card-title">Nombre del Elemento 2</h5>
            <p class="card-text">Otra descripción breve que muestra características o beneficios del producto.</p>
            <div class="d-flex justify-content-between align-items-center">
              <span class="price-tag">$29.99</span>
              <button class="btn btn-sm btn-outline-primary">Ver Detalles</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
