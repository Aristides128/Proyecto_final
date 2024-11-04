<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Listado Profesional</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-listing {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-listing:hover {
            transform: translateY(-5px);
        }

        .list-header {
            font-weight: 700;
            color: #343a40;
            margin-bottom: 20px;
        }

        .product-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #212529;
            margin-bottom: 10px;
        }

        .card-text {
            flex-grow: 1;
            margin-bottom: 10px; /* Espacio entre el texto y los botones */
        }

        .action-btns {
            display: flex;
            gap: 5px;
            margin-top: auto; /* Asegura que los botones se alineen al final */
        }
    </style>
</head>

<body>

    <div class="container my-4">
        <h1 class="list-header text-center mb-4">Listado de Elementos</h1>
        <!-- Listado de elementos -->
        <div class="row">
            <!-- Card Item 1 -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-listing">
                    <img src="https://via.placeholder.com/150" alt="Imagen del Producto" class="product-img">
                    <div class="card-body">
                        <h5 class="card-title">Nombre del Elemento</h5>
                        <p class="card-text">Descripción breve sobre el elemento listado. Puedes agregar detalles importantes aquí.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">Categoría</span>
                            <div class="action-btns">
                                <button class="btn btn-sm btn-outline-primary" onclick="location.href='./detalles.php'" data-bs-toggle="tooltip" title="Ver detalles">Ver</button>
                                <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Editar este elemento">Editar</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Eliminar este elemento">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Item 2 -->
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-listing">
                    <img src="https://via.placeholder.com/150" alt="Imagen del Producto" class="product-img">
                    <div class="card-body">
                        <h5 class="card-title">Nombre del Elemento 2</h5>
                        <p class="card-text">Descripción breve sobre el segundo elemento listado.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">Categoría</span>
                            <div class="action-btns">
                                <button class="btn btn-sm btn-outline-primary" onclick="location.href='./detalles.php'" data-bs-toggle="tooltip" title="Ver detalles">Ver</button>
                                <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Editar este elemento">Editar</button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Eliminar este elemento">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agregar más tarjetas duplicando el bloque anterior si es necesario -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inicializar tooltips
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
</body>

</html>
