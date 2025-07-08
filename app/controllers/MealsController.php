<?php

require_once __DIR__ . '/../libs/Controller.php';
require_once __DIR__ . '/../models/MealModel.php';

class MealsController extends Controller
{
    private static $mealModel;

    public static function getModel(): MealModel
    {
        if (is_null(static::$mealModel))
            static::$mealModel = new MealModel();
        return static::$mealModel;
    }

    public static function index()
    {
        $_SESSION['navActive'] = 'meals';
        $meals = static::getModel()->showAllMeals();
        self::loadView('client/meals/meals', [
            'meals' => $meals,
            'mealsStatus' => 'active'
        ]);
    }

    public static function indexAdmin()
    {
        $_SESSION['navActive'] = 'meals';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['column'])) {
            $meals = self::getModel()->showAllMeals($_POST['column']);
        } else {
            $meals = static::getModel()->showAllMeals();
        }
        self::loadView('admin/meals/meals', [
            'meals' => $meals
        ]);
    }

    public static function show()
    {
        $_SESSION['navActive'] = 'meals';
        if (isset($_GET['meal_id'])) {
            $meal = self::getModel()->showMeal($_GET['meal_id']);
            if (!empty($meal)) {
                self::loadView('client/meals/meal', [
                    'meal' => $meal,
                    'mealsStatus' => 'active'
                ]);
                exit();
            }
        }
        header('location: index.php?action=meals');
        exit();
    }

    public static function info()
    {
        $_SESSION['navActive'] = 'orders';
        if (isset($_GET['meal_id'])) {
            $meal = self::getModel()->showMeal($_GET['meal_id']);
            if (!empty($meal)) {
                self::loadView('admin/meals/mealInfo', [
                    'meal' => $meal
                ]);
                exit();
            }
        }
        header('location: index.php?adminAction=orders');
        exit();
    }

    public static function add()
    {
        $_SESSION['navActive'] = 'meals';
        self::loadView('admin/meals/addMeal');
    }
    public static function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('location: index.php?adminAction=meals');
            exit();
        }

        extract($_POST);
        $_SESSION['error'] = [];

        // Kiểm tra đầu vào cơ bản
        if (empty($meal_name)) {
            $_SESSION['error'][] = "<div class='alert alert-danger'>Meal name is required.</div>";
        }
        if (empty($meal_price)) {
            $_SESSION['error'][] = "<div class='alert alert-danger'>Meal price is required.</div>";
        } elseif (!is_numeric($meal_price) || $meal_price <= 0) {
            $_SESSION['error'][] = "<div class='alert alert-danger'>Invalid meal price. Please enter a positive number.</div>";
        }

        if (!empty($_SESSION['error'])) {
            header('location: index.php?adminAction=meals');
            exit();
        }

        // CỐ Ý BỎ kiểm tra phần mở rộng và MIME type
        if (isset($_FILES['meal_image']) && $_FILES['meal_image']['error'] === 0) {
            $upload_dir = __DIR__ . '/../../uploads/';
            $web_path_prefix = 'uploads/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $file_name = time() . "_" . basename($_FILES["meal_image"]["name"]);
            $target_file = $upload_dir . $file_name;
            $web_path = $web_path_prefix . $file_name;

            if (move_uploaded_file($_FILES["meal_image"]["tmp_name"], $target_file)) {
                static::getModel()->setMealName($meal_name)
                    ->setMealPrice($meal_price)
                    ->setMealImageUrl($web_path)
                    ->addMeal();
                $_SESSION['message'] = '<div class="alert alert-success">Meal added successfully</div>';
                header('location: index.php?adminAction=meals');
                exit();
            } else {
                $_SESSION['error'][] = "<div class='alert alert-danger'>Failed to upload file.</div>";
            }
        } else {
            $_SESSION['error'][] = "<div class='alert alert-danger'>File upload error.</div>";
        }

        header('location: index.php?adminAction=meals');
        exit();
    }


    // public static function store()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //         extract($_POST);
    //         $_SESSION['error'] = [];

    //         if (empty($meal_name)) $_SESSION['error'][] = "<div class='alert alert-danger'>Meal name is required.</div>";
    //         if (empty($meal_price)) $_SESSION['error'][] = "<div class='alert alert-danger'>Meal price is required.</div>";
    //         if (!is_numeric($meal_price) || $meal_price <= 0) $_SESSION['error'][] = "<div class='alert alert-danger'>Invalid meal price. Please enter a positive number.</div>";

    //         if (empty($_SESSION['error'])) {
    //             if (isset($_FILES['meal_image']) && $_FILES['meal_image']['error'] === 0) {
    //                 $upload_dir = __DIR__ . '/../../uploads/';
    //                 $web_path_prefix = 'uploads/';

    //                 if (!is_dir($upload_dir)) {
    //                     mkdir($upload_dir, 0777, true);
    //                 }

    //                 $file_name = time() . "_" . basename($_FILES["meal_image"]["name"]);
    //                 $target_file = $upload_dir . $file_name;
    //                 $web_path = $web_path_prefix . $file_name;

    //                 $dangerous_extensions = ['php', 'php3', 'php4', 'php5', 'phtml', 'phar'];
    //                 $ext_pattern = '/\\.(' . implode('|', $dangerous_extensions) . ')(\\..+)?$/';

    //                 if (preg_match($ext_pattern, $_FILES['meal_image']['name'])) {
    //                     $_SESSION['error'][] = "<div class='alert alert-danger'>File extension not allowed.</div>";
    //                 } else {
    //                     $check = getimagesize($_FILES["meal_image"]["tmp_name"]);
    //                     if ($check !== false && $_FILES["meal_image"]["size"] <= 5000000) {
    //                         if (move_uploaded_file($_FILES["meal_image"]["tmp_name"], $target_file)) {
    //                             static::getModel()->setMealName($meal_name)
    //                                 ->setMealPrice($meal_price)
    //                                 ->setMealImageUrl($web_path)
    //                                 ->addMeal();
    //                             $_SESSION['message'] = '<div class="alert alert-success">Meal added successfully</div>';
    //                             header('location: index.php?adminAction=meals');
    //                             exit();
    //                         } else {
    //                             $_SESSION['error'][] = "<div class='alert alert-danger'>Failed to upload image.</div>";
    //                         }
    //                     } else {
    //                         $_SESSION['error'][] = "<div class='alert alert-danger'>Invalid image or too large.</div>";
    //                     }
    //                 }
    //             } else {
    //                 $_SESSION['error'][] = "<div class='alert alert-danger'>Image file is required.</div>";
    //             }
    //         }
    //     }
    //     header('location: index.php?adminAction=meals');
    //     exit();
    // }

    public static function edit()
    {
        $_SESSION['navActive'] = 'meals';
        if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['meal_id'])) {
            $meal = self::getModel()->showMeal($_GET['meal_id']);
            if ($meal == true) {
                self::loadView('admin/meals/editMeal', ['meal' => $meal]);
                exit();
            }
        }
        header('location: index.php?adminAction=meals');
        exit();
    }

    public static function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['meal_id'])) {
            extract($_POST);
            $_SESSION['error'] = [];

            if (empty($meal_name)) $_SESSION['error'][] = "<div class='alert alert-danger'>Meal name is required.</div>";
            if (empty($meal_price)) $_SESSION['error'][] = "<div class='alert alert-danger'>Meal price is required.</div>";
            if (!is_numeric($meal_price) || $meal_price <= 0) $_SESSION['error'][] = "<div class='alert alert-danger'>Invalid meal price. Please enter a positive number.</div>";

            $imagePath = $meal_image_url;

            if (isset($_FILES['meal_image']) && $_FILES['meal_image']['error'] === 0) {
                $upload_dir = __DIR__ . '/../../uploads/';
                $web_path_prefix = 'uploads/';

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                $file_name = time() . "_" . basename($_FILES["meal_image"]["name"]);
                $target_file = $upload_dir . $file_name;
                $web_path = $web_path_prefix . $file_name;

                $dangerous_extensions = ['php', 'php3', 'php4', 'php5', 'phtml', 'phar'];
                $ext_pattern = '/\\.(' . implode('|', $dangerous_extensions) . ')(\\..+)?$/';

                if (!preg_match($ext_pattern, $_FILES['meal_image']['name'])) {
                    $check = getimagesize($_FILES["meal_image"]["tmp_name"]);
                    if ($check !== false && $_FILES["meal_image"]["size"] <= 5000000) {
                        if (move_uploaded_file($_FILES["meal_image"]["tmp_name"], $target_file)) {
                            $imagePath = $web_path;
                        } else {
                            $_SESSION['error'][] = "<div class='alert alert-danger'>Failed to upload image.</div>";
                        }
                    } else {
                        $_SESSION['error'][] = "<div class='alert alert-danger'>Invalid image or too large.</div>";
                    }
                } else {
                    $_SESSION['error'][] = "<div class='alert alert-danger'>File extension not allowed.</div>";
                }
            }

            if (empty($_SESSION['error'])) {
                $isUpdated = static::getModel()->setMealName($meal_name)
                    ->setMealPrice($meal_price)
                    ->setMealImageUrl($imagePath)
                    ->updateMeal($_GET['meal_id']);

                if ($isUpdated) {
                    $_SESSION['message'] = '<div class="alert alert-success">Meal updated successfully.</div>';
                } else {
                    $_SESSION['error'][] = '<div class="alert alert-danger">Cannot update meal.</div>';
                }
            }
        }
        header('location: index.php?adminAction=meals');
        exit();
    }

    public static function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['meal_id'])) {
            $isDeleted = static::getModel()->deleteMeal($_GET['meal_id']);
            if ($isDeleted === true)
                $_SESSION['message'] = '<div class="alert alert-success">Meal deleted successfully.</div>';
            else
                $_SESSION['error'] = '<div class="alert alert-danger">Cannot delete meal.</div>';
        }
        header('location: index.php?adminAction=meals');
    }
}
