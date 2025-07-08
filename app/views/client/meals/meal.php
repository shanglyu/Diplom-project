<?php
$title = htmlspecialchars($meal['meal_name']);
ob_start(); 
?>

<div class="container">
    <a href="index.php?action=meals">Посмотреть другие блюда</a>
    <hr>

    <?php if (!empty($message)) echo $message; ?>
    <?php if (!empty($error)) echo $error; ?>

    <div class="row">
        <div class="col-sm-5">
            <?php
                $imagePath = htmlspecialchars($meal['meal_image_url']);
                if (!preg_match('/^uploads\\//', $imagePath)) {
                    $imagePath = 'uploads/' . basename($imagePath);
                }
            ?>
            <img src="<?= $imagePath ?>" class="img-thumbnail" alt="Фото блюда">
        </div>
        <div class="col-sm-7">
            <h2><?= htmlspecialchars($meal['meal_name']) ?></h2>
            <h5><?= htmlspecialchars($meal['meal_price']) ?> ₽</h5>
            <br>
            <form method="post" action="index.php?action=addToCart&meal_id=<?= (int)$meal['meal_id'] ?>">
                <div class="row align-items-center">
                    <div class="col-3">
                        <input type="number" name="quantity" class="form-control" value="1" min="1">
                        <small class="text-muted">количество</small>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-success w-100">Добавить в корзину</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once(__DIR__ . '/../layout.php');
?>
