<?php
$title = "Редактировать блюдо";
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

<hr>
<div class="row justify-content-center">
    <form method="post" action="index.php?adminAction=updateMeal&meal_id=<?= (int) $meal['meal_id'] ?>" enctype="multipart/form-data" class="col-9">

        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="meal_id" value="<?= (int) $meal['meal_id'] ?>" readonly>
            <label for="meal_id">ID блюда</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="meal_name" value="<?= htmlspecialchars($meal['meal_name']) ?>" required>
            <label for="meal_name">Название блюда</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="meal_price" value="<?= htmlspecialchars($meal['meal_price']) ?>" step="0.001" required>
            <label for="meal_price">Цена блюда (₽)</label>
        </div>

        <!-- Ẩn đường dẫn ảnh cũ -->
        <input type="hidden" name="meal_image_url" value="<?= htmlspecialchars($meal['meal_image_url']) ?>">

        <!-- Preview ảnh hiện tại -->
        <div class="mb-3">
            <label class="form-label">Текущее изображение:</label><br>
            <?php
              $imagePath = htmlspecialchars($meal['meal_image_url']);
              if (!preg_match('/^uploads\\//', $imagePath)) {
                  $imagePath = 'uploads/' . basename($imagePath);
              }
            ?>
            <img src="<?= $imagePath ?>" alt="Текущее изображение блюда" style="max-width: 200px; height: auto;">
        </div>

        <!-- Upload ảnh mới -->
        <div class="mb-3">
            <label for="meal_image" class="form-label">Загрузить новое изображение блюда (необязательно)</label>
            <input type="file" class="form-control" id="meal_image" name="meal_image" accept="image/*">
            <small class="form-text text-muted">Оставьте пустым, если не хотите менять изображение.</small>
        </div>

        <div class="row justify-content-end">
            <button type="submit" class="btn btn-success col-2 mb-3">Сохранить</button>
        </div>

    </form>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layoutAdmin.php';
?>
