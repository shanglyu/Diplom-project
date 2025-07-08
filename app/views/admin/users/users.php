<?php
$title = "Пользователи 👥";
$options = '<option selected>Сортировать по</option>
            <option value="user_id">ID</option>
            <option value="user_surname">Имя</option>
            <option value="user_login">Логин</option>
            <option value="user_age">Возраст</option>
            <option value="user_email">Электронная почта</option>
            <option value="user_role">Роль</option>';
ob_start();
?>
<div class="row justify-content-center">
    <div class="col-11">
        <table class="table table-hover table-bordered text-center align-middle" width="50">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Электронная почта</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user['user_id'] ?></th>
                        <td><?= $user['user_surname'] ?></td>
                        <td><?= $user['user_email'] ?></td>
                        <td><?= $user['user_age'] ?></td>
                        <td><?= $user['user_login'] ?></td>
                        <td><?php echo $user['user_role'] == 0 ? 'user' : 'admin'; ?></td>
                        <td>
                            <a class="link-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Редактировать" href="index.php?adminAction=editUser&user_id=<?= $user['user_id'] ?>">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </a>
                            <a class="link-danger" href="index.php?adminAction=deleteUser&user_id=<?= $user['user_id'] ?>">
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
