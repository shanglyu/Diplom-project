<?php
$title = "Ошибка";
ob_start();
?>
<br>
<a class="link link-warning" href="index.php">
  <span class="material-symbols-outlined">
    arrow_back
  </span>
  Вернуться назад
</a>
<div>&nbsp;</div>

<div class="alert alert-danger text-center" role="alert">
  Произошла ошибка! Пожалуйста, попробуйте еще раз или свяжитесь с администратором.
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/layoutAdmin.php';

?>
