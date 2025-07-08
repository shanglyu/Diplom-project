<?php

session_start();

// Load các controller theo cách an toàn dùng __DIR__
require_once(__DIR__ . '/../controllers/HomeController.php');
require_once(__DIR__ . '/../controllers/MealsController.php');
require_once(__DIR__ . '/../controllers/OrdersController.php');
require_once(__DIR__ . '/../controllers/UsersController.php');
require_once(__DIR__ . '/../controllers/AuthController.php');
require_once(__DIR__ . '/../controllers/CartController.php');

// ROUTING : Người dùng
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home':
            HomeController::index();
            break;

        // Meals
        case 'meals':
            MealsController::index();
            break;
        case 'meal':
            MealsController::show();
            break;

        // Auth
        case 'register':
            AuthController::getRegisterView();
            break;
        case 'login':
            AuthController::getLoginView();
            break;
        case 'addUser':
            AuthController::register();
            break;
        case 'verifyLogin':
            AuthController::login();
            break;
        case 'logout':
            AuthController::logout();
            break;

        // Users
        case 'editAccount':
            UsersController::edit();
            break;
        case 'updateAccount':
            UsersController::update();
            break;

        // Cart
        case 'cart':
            CartController::index();
            break;
        case 'addToCart':
            CartController::add();
            break;
        case 'removeFromCart':
            CartController::remove();
            break;
        case 'clearCart':
            CartController::clear();
            break;
        case 'setQuantity':
            CartController::setQuantity();
            break;
        case 'addOrder':
            OrdersController::add();
            break;

        default:
            HomeController::error();
            break;
    }
}

// ROUTING : Quản trị (admin)
if (isset($_GET['adminAction'])) {
    $action = $_GET['adminAction'];
    switch ($action) {
        case 'home':
            HomeController::indexAdmin();
            break;

        // Meals (Admin)
        case 'meals':
            MealsController::indexAdmin();
            break;
        case 'mealInfo':
            MealsController::info();
            break;
        case 'deleteMeal':
            MealsController::delete();
            break;
        case 'addMeal':
            MealsController::add();
            break;
        case 'storeMeal':
            MealsController::store();
            break;
        case 'editMeal':
            MealsController::edit();
            break;
        case 'updateMeal':
            MealsController::update();
            break;

        // Users (Admin)
        case 'users':
            UsersController::indexAdmin();
            break;
        case 'userProfile':
            UsersController::profile();
            break;
        case 'deleteUser':
            UsersController::delete();
            break;
        case 'editUser':
            UsersController::edit();
            break;
        case 'updateUser':
            UsersController::update();
            break;

        // Orders (Admin)
        case 'orders':
            OrdersController::indexAdmin();
            break;
        case 'editOrder':
            OrdersController::edit();
            break;
        case 'updateOrder':
            OrdersController::update();
            break;
        case 'deleteOrder':
            OrdersController::delete();
            break;

        default:
            HomeController::error();
            break;
    }
}
// Nếu không có action hoặc adminAction, chuyển hướng về home
// if (!isset($_GET['action']) && !isset($_GET['adminAction'])) {
//     header('Location: index.php?action=home');
//     exit();
// }
