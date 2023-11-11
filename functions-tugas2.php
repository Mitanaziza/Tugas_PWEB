<?php

require_once 'controller/main.php';

function view($page, $data = []) {
    include 'view/' . $page . '.php';
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function route($url) {
    switch ($url) {
        case 'judol.cuy/admin':
            if (isAdmin()) {
                Admin::dashboard();
            } else {
                redirect('judol.cuy/login');
            }
            break;
        case 'judol.cuy/admin?loggedIn=true':
            break;
        case 'judol.cuy/dashboard':
            if (isAdmin() || isCustomer()) {
                view('admin-panel/admin-dashboard');
            } else {
                redirect('judol.cuy/login');
            }
            break;
        case 'judol.cuy/login':
            if (isLoggedAdmin() || isLoggedCustomer()) {
                redirect('judol.cuy/dashboard');
            } else {
                Admin::login_form();
            }
            break;
        case 'judol.cuy/login?status=true':
            break;
        case 'judol.cuy/register':
            if (isLoggedAdmin() || isLoggedCustomer()) {
                redirect('judol.cuy/dashboard');
            } else {
                Customer::register_form();
            }
            break;
        case 'judol.cuy/register?action=save':
            break;
        case 'judol.cuy/profile':
            if (isLoggedAdmin() || isLoggedCustomer()) {
                Customer::profile();
            } else {
                redirect('judol.cuy/login');
            }
            break;
        case 'judol.cuy/profile?action=edited':
            break;
        case 'judol.cuy':
            Home::index();
            break;
        case 'judol.cuy/item':
            Item::index();
            break;
        case 'judol.cuy/item?id=...':
            $id = extractIdFromUrl($url);
            Item::show($id);
            break;
        case 'judol.cuy/cart':
            Cart::index();
            break;
        case 'judol.cuy/order':
            Order::index();
            break;
        case 'judol.cuy/order?id=...':
            $id = extractIdFromUrl($url);
            Order::show($id);
            break;
        case 'judol.cuy/contact':
            Contact::index();
            break;
        case 'judol.cuy/logout':
            User::logout();
            break;
        default:
            view('404');
            break;
    }
}

function extractIdFromUrl($url) {
    // Extract id from the URL
    // You can implement your own logic based on the URL structure
    // For example, if the URL is judol.cuy/item?id=123, return 123
    // This is just a placeholder, modify it based on your actual URL structure
    $parts = explode('=', $url);
    return end($parts);
}

?>
