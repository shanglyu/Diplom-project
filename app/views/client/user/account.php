\<?php
$title = "Аккаунт";
ob_start(); 
?>

<div class="container">
    <h2>Редактировать информацию профиля</h2>

    <form method="post" action="index.php?action=updateAccount&user_id=<?= $user['user_id'] ?>">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Имя</label>
                <input type="text" class="form-control" name="user_surname" value="<?= htmlspecialchars($user['user_surname']) ?>">
            </div>
            <div class="form-group col-md-4">
                <label>Email</label>
                <input type="email" class="form-control" name="user_email" value="<?= htmlspecialchars($user['user_email']) ?>">
            </div>
            <div class="form-group col-md-4">
                <label>Возраст</label>
                <input type="number" class="form-control" name="user_age" value="<?= htmlspecialchars($user['user_age']) ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col">
                <label>Логин</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" name="user_login" value="<?= htmlspecialchars($user['user_login']) ?>" required>
                </div>
            </div>
        </div>

        <h5>Чтобы подтвердить изменения, введите пароль:</h5>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Пароль</label>
                <input type="password" class="form-control" name="user_password" placeholder="Пароль">
            </div>
            <div class="form-group col-md-6">
                <label>Подтвердите пароль</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Подтвердите пароль">
            </div>
        </div>

        <div class="row">
            <div class="col-9">
                <a href="index.php?action=deleteAccount&user_id=<?= $user['user_id'] ?>" class="btn btn-danger">Удалить аккаунт</a>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">Подтвердить</button>
            </div>
        </div>

    </form>

    <?= $message ?>
    <?= $error ?>

</div>

<?php
$content = ob_get_clean();
$registerContent = 'Мой аккаунт';
$registerStatus = 'active';
include_once(__DIR__ . '/../layout.php');

?>
