<?php
$title = "Информация о блюде";
ob_start();
?>
<br>
<a class="link link-warning" href="index.php?adminAction=orders">
  <span class="material-symbols-outlined">
    arrow_back
  </span>
  Назад
</a>
<div>&nbsp;</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Поле</th>
      <th scope="col">Значение</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">ID</th>
      <td><?= htmlspecialchars($meal['meal_id']) ?></td>
    </tr>

    <tr>
      <th scope="row">Изображение</th>
      <td>
        <?php
          $imagePath = htmlspecialchars($meal['meal_image_url']);
          if (!preg_match('/^uploads\\//', $imagePath)) {
              $imagePath = 'uploads/' . basename($imagePath);
          }
        ?>
        <img src="<?= $imagePath ?>" alt="Фото блюда" style="max-width: 200px; height: auto;">
      </td>
    </tr>

    <tr>
      <th scope="row">Название</th>
      <td><?= htmlspecialchars($meal['meal_name']) ?></td>
    </tr>

    <tr>
      <th scope="row">Цена (₽)</th>
      <td><?= htmlspecialchars($meal['meal_price']) ?></td>
    </tr>
  </tbody>
</table>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layoutAdmin.php';
?>
