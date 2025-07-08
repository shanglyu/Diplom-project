<?php

require_once __DIR__ . '/../libs/Controller.php';
require_once __DIR__ . '/MealsController.php';
require_once __DIR__ . '/OrdersController.php';

class HomeController extends Controller
{


    public static function index()
    {
        $_SESSION['navActive'] = 'home';
    
        $welcomeMessage = isset($_SESSION['welcomeMessage']) ? $_SESSION['welcomeMessage'] : '';
        unset($_SESSION['welcomeMessage']);
    
        // Truyền thêm $mealsStatus và $cartStatus vào view
        $mealsStatus = '';
        $cartStatus = '';
    
        $meals = MealsController::getModel()->showAllMeals();
    
        self::loadView("client/home", [
            'meals' => $meals,
            'welcomeMessage' => $welcomeMessage,
            'homeStatus' => 'active',
            'mealsStatus' => $mealsStatus,
            'cartStatus' => $cartStatus
        ]);
    }
    


    public static function indexAdmin()
    {
        $_SESSION['navActive'] = 'home';
        if (@$_SESSION['authorized'] !== 'yes') {
            header('location: index.php?action=home');
            exit();
        }

        $orders = OrdersController::getModel()->showAllOrders();
        self::loadView('admin/homeAdmin', ['orders' => $orders]);
    }

    public static function error()
    {
        if(@$_SESSION['authorized']==='yes') {
            self::loadView('admin/error');
        }
        self::loadView('client/error');
    }
    
}
