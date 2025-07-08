<?php
$title = "Добавить блюдо";
ob_start();
?>

<br>
<a class="link link-warning" href="index.php?adminAction=meals">
  <span class="material-symbols-outlined">
    arrow_back
  </span>
  Назад
</a>
<div>&nbsp;</div>

<?php if (!empty($_SESSION['error'])): ?>
    <?php foreach ($_SESSION['error'] as $err): ?>
        <?= $err ?>
    <?php endforeach; ?>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<hr>
<div class="row justify-content-center">
    <form method="post" action="index.php?adminAction=storeMeal" enctype="multipart/form-data" class="col-9">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="meal_name" value="<?= isset($_POST['meal_name']) ? htmlspecialchars($_POST['meal_name']) : '' ?>" required>
            <label for="meal_name">Название блюда</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="meal_price" value="<?= isset($_POST['meal_price']) ? htmlspecialchars($_POST['meal_price']) : '' ?>" step="0.001" required>
            <label for="meal_price">Цена блюда (₽)</label>
        </div>

        <div class="mb-3">
            <label for="meal_image" class="form-label">Загрузить изображение блюда</label>
            <input type="file" class="form-control" id="meal_image" name="meal_image" accept="image/*" required>
        </div>

        <div class="row justify-content-end">
            <button type="submit" class="btn btn-success col-2 mb-3">Добавить</button>
        </div>

    </form>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layoutAdmin.php';
?>
