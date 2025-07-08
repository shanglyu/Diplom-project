<?php
$title = "Главная";
ob_start(); 
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;700&display=swap');
:root {
    --pho-green: #2c8b5b;          /* Fresh herb tone */
    --pho-green-dark: #256e46;     /* Darker hover tone */
    --pho-broth: #d4aa6e;          /* Warm broth accent */
    --pho-bg: #fdf9f0;             /* Light beige background */
}

body {
    background: linear-gradient(rgba(253, 249, 240, 0.9), rgba(253, 249, 240, 0.9)),
                url('views/bk/hero.png') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Be Vietnam Pro', Arial, sans-serif;
    color: #333;
}

.jumbotron-custom {
    background: rgba(255, 255, 255, 0.88);
    border: 2px solid var(--pho-green);
    border-radius: 1rem;
    padding: 2rem;
    margin-top: 2rem;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.btn-vietnam {
    background-color: var(--pho-green);
    border: none;
    color: #fff;
}

.btn-vietnam:hover {
    background-color: var(--pho-green-dark);
}

h1, h3 {
    color: var(--pho-green);
    font-weight: 700;
}

.badge-vn {
    background-color: var(--pho-broth);
    color: #212529;
}

.card {
    border: 2px solid var(--pho-green);
    border-radius: 0.75rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.card-body {
    background-color: rgba(255, 255, 255, 0.95);
}
</style>

<br>

<div class="container-sm">

<?= $welcomeMessage ?>

<?= $message ?>
<?= $error ?>

    <div class="jumbotron-custom">
        <h1 class="display-4">Хотите попробовать настоящий вкус Фо?</h1>
        <p class="lead">Добро пожаловать в +84 Phở — место, где встречаются традиции и аромат 🍜</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-vietnam btn-lg" href="index.php?action=meals" role="button">Заказать сейчас!</a>
        </p>
    </div>

    <div class="container mt-5">
        <h3>Наши лучшие <span class="badge badge-vn">ПРЕДЛОЖЕНИЯ</span>!</h3>
        <div class="row">
            <?php 
            $counter = 0;
            foreach ($meals as $meal) :
                if ($counter >= 3) break; ?>
                <div class="col-sm-4 mb-4">
                    <div class="card h-100">
                        <a href="index.php?action=meal&meal_id=<?= $meal['meal_id'] ?>" class="card-link" style="text-decoration: none; color: inherit;">
                            <img class="card-img-top" src="<?= htmlspecialchars($meal['meal_image_url']) ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($meal['meal_name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($meal['meal_price']) ?> ₽</p>
                        </a>
                        <form method="post" action="index.php?action=addToCart&meal_id=<?= $meal['meal_id'] ?>">
                            <div class="row mt-2">
                                <button type="submit" class="col-7 btn btn-success">Добавить в корзину</button>
                                <div class="col-5">
                                    <input type="number" name="quantity" class="form-control" value="1" min="1">
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-8"></div>
                            <small class="text-muted col-4">
                                количество
                            </small>
                        </div>
                    </div>
                </div>
        </div>
    <?php
                $counter++;
            endforeach; ?>
    </div>
</div>

</div>

<?php
$content = ob_get_clean();
$homeStatus = 'active';
include_once 'layout.php';
?>
