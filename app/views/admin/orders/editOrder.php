<?php
$title = "Редактировать заказ";
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

<div class="row justify-content-center">
    <form method="post" action="index.php?adminAction=updateOrder&order_id=<?= $order['order_id'] ?>" class="col-9">

        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="order_id" value="<?= $order['order_id'] ?>" readonly>
            <label for="order_id">ID заказа</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="order_date" value="<?= $order['order_date'] ?>" min="<?= $order['order_date'] ?>" max="<?= date('Y-m-d') ?>">
            <label for="order_date">Дата заказа</label>
        </div>

        <select class="form-select mb-3" name="order_status">
            <option selected disabled>Статус заказа</option>
            <option value="Cancelled" <?= $order['order_status'] === 'Cancelled' ? 'selected' : '' ?>>Отменён</option>
            <option value="Shipping" <?= $order['order_status'] === 'Shipping' ? 'selected' : '' ?>>В доставке</option>
            <option value="Completed" <?= $order['order_status'] === 'Completed' ? 'selected' : '' ?>>Завершён</option>
        </select>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="meal_id" value="<?= $order['meal_id'] ?>" readonly>
            <label for="meal_id">ID блюда</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="user_id" value="<?= $order['user_id'] ?>" readonly>
            <label for="user_id">ID пользователя</label>
        </div>

        <div class="row justify-content-end">
            <button type="submit" class="btn btn-success col-2 mb-3">Сохранить</button>
        </div>

    </form>
</div>

<p class="alert alert-warning">
    <strong>PS:</strong> Думаю, это бесполезно.</p>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layoutAdmin.php';
?>
