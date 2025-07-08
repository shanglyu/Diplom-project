<?php
$title = "Вход";
ob_start(); 
?>

<div class="container">

    <h3>С возвращением!</h3>
    <br>
    <form method="post" action="index.php?action=verifyLogin">

        <div class="form-group">
            <label for="user_login">Имя пользователя</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" name="user_login" placeholder="Имя пользователя" required>
            </div>
        </div>

        <div class="form-group">
            <label for="user_password">Пароль</label>
            <input type="password" class="form-control" name="user_password" placeholder="Пароль">
        </div>

        <div class="row">
            <div class="col-9">
                <a href="index.php?action=register">Впервые здесь? Присоединяйтесь к нам!</a>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success" name="login-btn">Войти</button>
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
