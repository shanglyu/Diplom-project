<?php
$title = "Блюда 😋";
$options = '<option selected>Сортировать по</option>
            <option value="meal_id">ID</option>
            <option value="meal_name">Название</option>
            <option value="meal_price">Цена</option>';
ob_start();
?>

<div class="row justify-content-center">
    <a href="index.php?adminAction=addMeal" class="btn btn-success col-1">Добавить блюдо</a>
</div>
<br>
<div class="row justify-content-center">

    <div class="col-10">
        <table class="table table-hover table-bordered text-center align-middle" width="50">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена (₽)</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meals as $meal) : ?>
                    <tr>
                        <th scope="row"><?= $meal['meal_id'] ?></th>
                        <td class="col-1">
                            <img src="<?= htmlspecialchars($meal['meal_image_url']) ?>" alt="Фото блюда" class="" width="" height="50">
                        </td>
                        <td><?= htmlspecialchars($meal['meal_name']) ?></td>
                        <td><?= htmlspecialchars($meal['meal_price']) ?> ₽</td>
                        <td>
                            <a class="link-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Редактировать" href="index.php?adminAction=editMeal&meal_id=<?= $meal['meal_id'] ?>">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </a>
                            <a class="link-danger" href="index.php?adminAction=deleteMeal&meal_id=<?= $meal['meal_id'] ?>">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layoutAdmin.php';
?>
