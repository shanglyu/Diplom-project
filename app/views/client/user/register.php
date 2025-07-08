<?php
$title = "Регистрация";
ob_start(); 
?>

<div class="container">
    <form method="post" action="index.php?action=addUser">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Имя</label>
                <input type="text" class="form-control" name="user_surname" placeholder="Имя">
            </div>
            <div class="form-group col-md-4">
                <label>Email</label>
                <input type="email" class="form-control" name="user_email" placeholder="Email">
                <small class="text-muted">
                    Введите действительный email, на который придет приветственное письмо!
                </small>
            </div>
            <div class="form-group col-md-4">
                <label>Возраст</label>
                <input type="number" class="form-control" name="user_age" placeholder="Возраст">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Логин</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" name="user_login" placeholder="Имя пользователя" required>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Пароль</label>
                <input type="password" class="form-control" name="user_password" placeholder="Пароль">
                <small class="text-muted">
                    Должен содержать не менее 7 символов.
                </small>
            </div>
        </div>

        <div class="row">
            <div class="col-9">
                <a href="index.php?action=login">Уже есть аккаунт? Войти!</a>
            </div>
            <div class="col">
                <button type="submit" name="submit-button" class="btn btn-success">Зарегистрироваться</button>
            </div>
        </div>
    </form>

    <br>

    <?= $error ?>
    <?= $message ?>

</div>

<?php
$content = ob_get_clean();
include_once(__DIR__ . '/../layout.php');

?>
