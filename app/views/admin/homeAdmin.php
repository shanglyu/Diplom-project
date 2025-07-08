<?php
$title = "Панель администратора";

ob_start();
?>

<div class="container">
    <div class="alert alert-primary">
        Добро пожаловать, администратор! 🥰
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <p>&nbsp;</p>
            <h4>Последние заказы 💰</h4>
            <div class="col-12">
                <table class="table table-hover table-bordered text-center align-middle" width="50">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Блюдо</th>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        foreach ($orders as $order) :
                            $index++;
                            if ($index == 4) break; ?>
                            <tr>
                                <th scope="row"><?= $order['order_id'] ?></th>
                                <td class="col-1"><?= htmlspecialchars($order['order_date']) ?></td>
                                <td><?= htmlspecialchars($order['order_status']) ?></td>
                                <td>
                                    <a class="link-success" href="index.php?adminAction=userProfile&user_id=<?= $order['user_id'] ?>">
                                        Профиль пользователя (ID=<?= $order['user_id'] ?>)
                                    </a>
                                </td>
                                <td>
                                    <a class="link-warning" href="index.php?adminAction=mealInfo&meal_id=<?= $order['meal_id'] ?>">
                                        Информация о блюде (ID=<?= $order['meal_id'] ?>)
                                    </a>
                                </td>

                                <td>
                                    <a href="index.php?adminAction=editOrder&order_id=<?= $order['order_id'] ?>" class="link-success">
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>
                                    </a>
                                    <a class="link-danger" href="index.php?adminAction=deleteOrder&order_id=<?= $order['order_id'] ?>">
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

            <a class="btn btn-success col-2 align-self-center" href="index.php?adminAction=orders">Показать все заказы</a>
            <h6>&nbsp;</h6>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once __DIR__ . '/layoutAdmin.php';

?>
