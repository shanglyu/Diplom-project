<?php
$title = "Блюда";
ob_start();
?>

<div class="container">

    <br>
    <h3>Блюда 😋</h3>
    <br>

    <?php if (!empty($message)) echo $message; ?>
    <?php if (!empty($error)) echo $error; ?>

    <div class="row justify-content-center">
        <?php foreach ($meals as $meal) : ?>
            <div class="col-sm-4 mb-4">
                <div class="card">
                    <?php
                        $imagePath = htmlspecialchars($meal['meal_image_url']);
                        if (!preg_match('/^uploads\\//', $imagePath)) {
                            $imagePath = 'uploads/' . basename($imagePath);
                        }
                    ?>
                    <a href="index.php?action=meal&meal_id=<?= (int)$meal['meal_id'] ?>" class="card-link" style="text-decoration: none; color: inherit;">
                        <img class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" src="<?= $imagePath ?>" alt="Фото блюда">
                    </a>
                    <div class="card-body" style="height:200px;">
                        <h5 class="card-title"><?= htmlspecialchars($meal['meal_name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($meal['meal_price']) ?> <span class="">₽</span></p>

                        <form method="post" action="index.php?action=addToCart&meal_id=<?= (int)$meal['meal_id'] ?>">
                            <div class="row">
                                <div class="col-7">
                                    <button type="submit" class="btn btn-success w-100">Добавить</button>
                                </div>
                                <div class="col-5">
                                    <input type="number" name="quantity" class="form-control" value="1" min="1">
                                    <small class="text-muted">количество</small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once(__DIR__ . '/../layout.php');
?>
