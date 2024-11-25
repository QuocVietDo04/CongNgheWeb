<?php
require_once 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add' || $action === 'update') {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';
        
        // Xử lý upload ảnh
        $image = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $image = $target_dir . time() . '_' . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image);
        } elseif ($action === 'update' && isset($_POST['current_image'])) {
            $image = $_POST['current_image'];
        }
        
        if ($action === 'add') {
            addProduct($name, $price, $image);
        } else {
            updateProduct($id, $name, $price, $image);
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'] ?? '';
        deleteProduct($id);
    }
    
    header('Location: index.php');
    exit;
}
?>