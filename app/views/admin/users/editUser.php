<?php
$title = "Редактировать пользователя";
ob_start();
?>
<br>
<a class="link link-warning" href="index.php?adminAction=users">
  <span class="material-symbols-outlined">
    arrow_back
  </span>
  Назад
</a>
<br>
<div class="row justify-content-center">
    <form method="post" action="index.php?adminAction=updateUser&user_id=<?= $user['user_id'] ?>" class="col-9">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="user_surname" value="<?= $user['user_surname'] ?>">
            <label>Имя</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="user_email" value="<?= $user['user_email'] ?>">
            <label>Электронная почта</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="user_age" value="<?= $user['user_age'] ?>">
            <label>Возраст</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="user_login" value="<?= $user['user_login'] ?>">
            <label>Логин</label>
        </div>

        <select class="form-select mb-3" name="user_role">
            <option selected disabled>Роль</option>
            <option value="user" <?= $user['user_role'] === 0 ? 'selected' : '' ?>>user</option>
            <option value="admin" <?= $user['user_role'] === 1 ? 'selected' : '' ?>>admin</option>
        </select>

        <div class="row justify-content-end">
            <button type="submit" class="btn btn-success col-2 mb-3">Сохранить</button>
        </div>

    </form>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layoutAdmin.php';
?>
