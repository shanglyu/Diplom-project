<?php
$title = "Профиль пользователя";
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
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">ID</th>
      <td><?= $user['user_id'] ?></td>
    </tr>

    <tr>
      <th scope="row">Имя</th>
      <td><?= $user['user_surname'] ?></td>
    </tr>

    <tr>
      <th scope="row">Возраст</th>
      <td><?= $user['user_age'] ?></td>
    </tr>

    <tr>
      <th scope="row">Электронная почта</th>
      <td><?= $user['user_email'] ?></td>
    </tr>

    <tr>
      <th scope="row">Логин</th>
      <td><?= $user['user_login'] ?></td>
    </tr>

    <tr>
      <th scope="row">Роль</th>
      <td><?php echo $user['user_role'] === 0 ? 'user' : 'admin'; ?></td>
    </tr>

  </tbody>
</table>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/../layoutAdmin.php';
?>
