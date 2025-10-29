<?php
require_once 'config/config.php';
$url = BASE_URL . "pet/list"; 
$data = @file_get_contents($url);

if ($data === FALSE) {
    $pets = [];
} else {
    $json = json_decode($data, true);

    // Si la API envía los resultados en "data", tómalo
    $pets = isset($json['data']) ? $json['data'] : $json;
}
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        const API_BASE_URL = '<?= JS_API_URL ?>';
    </script>
    <script src="scripts/index.js"></script>
</head>
<body>
    <h1>Listado de Mascotas</h1>
    <table class="table table-dark table-striped">
        <th>
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>CHIP</td>
                <td>CATEGORY</td>
                <td>BORN</td>
                <td>ADOPT</td>
            </tr>
        </th>
        <tbody>
            <?php if(!empty($pets)):?>
                <?php foreach($pets as $pet): ?>

                    <tr>
                        <td><?= $pet['id'] ?></td>
                        <td><?= $pet['name'] ?></td>
                        <td><?= $pet['chip'] ?></td>
                        <td><?= $pet['category'] ?></td>
                        <td><?= $pet['born'] ?></td>
                        <td><?= $pet['adopt'] ? '✅ Adoptado' : '<button type="button" class="btn btn-success" onclick="adoptPet('.$pet['id'].')">Adoptar</button>' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No se encontraron mascotas o hubo un error de conexión con la API.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


</body>


</html>