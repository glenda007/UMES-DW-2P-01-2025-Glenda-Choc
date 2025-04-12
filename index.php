<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <h1 style="text-align: center;">Biblioteca</h1>
    <?php
    $libros = [
        ["titulo" => "Cien años de soledad", "autor" => "Gabriel García Márquez", "año" => 1967],
        ["titulo" => "Don Quijote de la Mancha", "autor" => "Miguel de Cervantes", "año" => 1605],
        ["titulo" => "El principito", "autor" => "Antoine de Saint-Exupéry", "año" => 1943],
        ["titulo" => "1984", "autor" => "George Orwell", "año" => 1949],
    ];
    ?>

    <table>
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
</body>
</html>