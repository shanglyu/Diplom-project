<div class="col-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="min-height: 100vh;">
    <a href="index.php?adminAction=home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="material-symbols-outlined bi me-2" width="40" height="32">
            restaurant_menu
        </span>
        <span class="fs-4">+84 Фо ✨</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="index.php?adminAction=home" class="nav-link link-dark" aria-current="page">
                <span class="material-symbols-outlined bi me-2">
                    dashboard
                </span>
                Главная
            </a>
        </li>

        <li>
            <a href="index.php?adminAction=orders" class="nav-link link-dark">
                <span class="material-symbols-outlined bi me-2">
                    shopping_cart
                </span>
                Заказы
            </a>
        </li>

        <li>
            <a href="index.php?adminAction=meals" class="nav-link link-dark">
                <span class="material-symbols-outlined bi me-2">
                    restaurant
                </span>
                Блюда
            </a>
        </li>

        <li>
            <a href="index.php?adminAction=users" class="nav-link link-dark">
                <span class="material-symbols-outlined bi me-2">
                    person
                </span>
                Клиенты
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="material-symbols-outlined rounded-circle me-2" width="32" height="32">
                account_circle
            </span>
            <strong>Администратор</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="index.php?action=logout">Выйти</a></li>
        </ul>
    </div>
</div>
