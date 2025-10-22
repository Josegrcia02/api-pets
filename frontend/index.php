<?php
$url = "http://host.docker.internal:8080/pet/list";
$data = file_get_contents($url);

//Json to Array
$pets = json_decode($data, true);



?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
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
                        <td>
                            <?php if(!$pet['adopt']): ?>
                                <button type="button" class="btn btn-success" onclick="adoptPet(<?= $pet['id'] ?>)">Adoptar</button>
                            <?php else: ?>
                                ✅ Adoptado
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </tbody>
    </table>


</body>


</html>