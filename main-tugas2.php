<?php
require_once 'controller/functions.php';

switch ($controller) {
    case 'admin':
        switch ($action) {
            case 'login':
                $controllerObj->login_form();
                break;
            case 'dashboard':
                $controllerObj->dashboard();
                break;
            default:
                echo '404 Not Found';
                break;
        }
        break;
    case 'customer':
        switch ($action) {
            case 'login':
                $controllerObj->login_form();
                break;
            case 'register':
                $controllerObj->register_form();
                break;
            case 'profile':
                $controllerObj->profile();
                break;
            case 'profile?action=edited':
                $controllerObj->profile_edited();
                break;
            default:
                echo '404 Not Found';
                break;
        }
        break;
    case 'home':
        switch ($action) {
            case 'index':
                $controllerObj->index();
                break;
            case 'contact':
                $controllerObj->contact();
                break;
            default:
                echo '404 Not Found';
                break;
        }
        break;
    case 'item':
        switch ($action) {
            case 'index':
                $controllerObj->index();
                break;
            case 'show':
                $id = $_GET['id'] ?? 0;
                $controllerObj->show($id);
                break;
            default:
                echo '404 Not Found';
                break;
        }
        break;
    case 'cart':
        switch ($action) {
            case 'index':
                $controllerObj->index();
                break;
            default:
                echo '404 Not Found';
                break;
        }
        break;
    case 'order':
        switch ($action) {
            case 'index':
                $controllerObj->index();
                break;
            case 'show':
                $id = $_GET['id'] ?? 0;
                $controllerObj->show($id);
                break;
            default:
                echo '404 Not Found';
                break;
        }
        break;
    case 'contact':
        switch ($action) {
            case 'index':
                $controllerObj->index();
                break;
            default:
                echo '404 Not Found';
                break;
        }
        break;
    case 'logout':
        $controllerObj->logout();
        break;
    default:
        echo '404 Not Found';
        break;
}
?>
