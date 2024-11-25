<?php
session_start();

// Khởi tạo mảng products nếu chưa tồn tại
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

function addProduct($name, $price, $image) {
    $id = time(); // Sử dụng timestamp làm ID
    $_SESSION['products'][$id] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'image' => $image
    ];
}

function updateProduct($id, $name, $price, $image) {
    if (isset($_SESSION['products'][$id])) {
        $_SESSION['products'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'image' => $image
        ];
    }
}

function deleteProduct($id) {
    if (isset($_SESSION['products'][$id])) {
        unset($_SESSION['products'][$id]);
    }
}

function getAllProducts() {
    return $_SESSION['products'];
}

function getProduct($id) {
    return isset($_SESSION['products'][$id]) ? $_SESSION['products'][$id] : null;
}
?>