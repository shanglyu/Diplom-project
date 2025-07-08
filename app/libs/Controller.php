<?php

class Controller
{
    public static function newModel($model)
    {
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model();
    }

    public static function loadView($view, $data = [])
    {
        $viewFile = __DIR__ . '/../views/' . $view . '.php';

        if (file_exists($viewFile)) {
            if (!empty($data)) extract($data);

            // Giao diện nav cho user thường
            $navElement = '<li class="nav-item <?=$registerStatus?>">
                               <a class="nav-link" href="index.php?action=register">Зарегистрируйтесь сейчас!</a>
                           </li>';

            if (isset($_SESSION['user_login_status']) && $_SESSION['user_login_status'] === "logged_in") {
                $navElement = '<li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle <?=$myAccountStatus?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       My account
                                   </a>
                                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       <a class="dropdown-item" href="index.php?action=editAccount&user_id=' . $_SESSION['user_id'] . '">Edit profile</a>
                                       <a class="dropdown-item" href="index.php?action=resetPassword">Reset password</a>
                                   </div> 
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="index.php?action=logout">Logout</a>
                               </li>';
            }

            $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
            $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';

            unset($_SESSION['message']);
            unset($_SESSION['error']);

            require_once $viewFile;
        } else {
            echo "View file not found: " . $viewFile;
            die('View does not exist');
        }
    }
}
