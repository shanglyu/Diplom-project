<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <title><?= htmlspecialchars($title) ?></title>
</head>

<body>
    <?php include_once(__DIR__ . '/../includes/nav.php'); ?>

    <br>

    <main>
        <?= $content ?>
    </main>

    <hr>

    <footer class="text-center mb-3">
        <div class="container">
            <p>Все права защищены | +84 Фо ❤️</p>
        </div>
    </footer>
</body>

</html>
