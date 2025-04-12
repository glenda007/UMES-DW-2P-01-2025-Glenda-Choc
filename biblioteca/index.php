<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="styles.css " href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Biblioteca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                </ul>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#nuevoLibroModal">Ingresar nuevo libro</button>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Biblioteca</h1>
        <?php
        $libros = [];
        if (file_exists('libros.txt')) {
            $lineas = file('libros.txt', FILE_IGNORE_NEW_LINES);
            foreach ($lineas as $linea) {
                list($titulo, $autor, $año) = explode('|', $linea);
                $libros[] = ["titulo" => $titulo, "autor" => $autor, "año" => $año];
            }
        }
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($libro["titulo"]); ?></td>
                        <td><?php echo htmlspecialchars($libro["autor"]); ?></td>
                        <td><?php echo htmlspecialchars($libro["año"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="nuevoLibroModal" tabindex="-1" aria-labelledby="nuevoLibroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoLibroModalLabel">Ingresar nuevo libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="nuevoLibroForm" method="POST" action="">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor" required>
                        </div>
                        <div class="mb-3">
                            <label for="año" class="form-label">Año</label>
                            <input type="number" class="form-control" id="año" name="año" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    ob_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = htmlspecialchars($_POST['titulo']);
        $autor = htmlspecialchars($_POST['autor']);
        $año = htmlspecialchars($_POST['año']);

        $linea = "$titulo|$autor|$año" . PHP_EOL;
        file_put_contents('libros.txt', $linea, FILE_APPEND);

        header('Location:' . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
    <?php ob_end_flush(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <footer class="footer bg-dark text-white py-3">
        <div class="container text-center">
            <span>Glenda Marisol Choc Xuyá 202460512</span>
        </div>
    </footer>
</body>
</html>