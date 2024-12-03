<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function index() {
        $products = Product::getAll();
        require 'app/views/product/index.php';
    }

    public function create() {
        require 'app/views/product/form.php';
    }

    public function store() {
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';
        $image = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $image = $target_dir . time() . '_' . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image);
        }

        Product::add($name, $price, $image);
        header('Location: index.php?controller=product&action=index');
        exit;
    }

    public function edit() {
        $id = $_GET['id'] ?? '';
        $product = Product::getById($id);
        require 'app/views/product/form.php';
    }

    public function update() {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';
        $current_image = $_POST['current_image'] ?? '';

        $image = $current_image;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $target_dir = "uploads/";
            $image = $target_dir . time() . '_' . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image);
        }

        Product::update($id, $name, $price, $image);
        header('Location: index.php?controller=product&action=index');
        exit;
    }

    public function delete() {
        $id = $_POST['id'] ?? '';
        Product::delete($id);
        header('Location: index.php?controller=product&action=index');
        exit;
    }
}