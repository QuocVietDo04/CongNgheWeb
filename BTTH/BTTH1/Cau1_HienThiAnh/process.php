<?php
require_once 'data.php';

function handleImageUpload($currentImage = '') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $target_dir = "uploads/";
        
        // Kiểm tra xem thư mục uploads có tồn tại không, nếu không thì tạo nó
        if (!file_exists($target_dir) && !is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $image = $target_dir . time() . '_' . basename($_FILES["image"]["name"]);
        
        // Thêm kiểm tra lỗi
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
            $error = error_get_last();
            error_log("Lỗi khi upload ảnh: " . $error['message']);
            return false;
        }
        return $image;
    }
    return $currentImage;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch($action) {
        case 'add':
            // Xử lý thêm hoa
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            // Xử lý upload ảnh
            $image = handleImageUpload();
            
            if(addFlower($name, $description, $image)) {
                header('Location: admin.php?status=added');
            } else {
                header('Location: admin.php?status=error');
            }
            break;
            
        case 'update':
            // Xử lý cập nhật hoa
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $currentImage = $_POST['current_image'] ?? '';
            
            $image = handleImageUpload($currentImage);
            
            if(updateFlower($id, $name, $description, $image)) {
                header('Location: admin.php?status=updated');
            } else {
                header('Location: admin.php?status=error');
            }
            break;
            
        case 'delete':
            // Xử lý xóa hoa
            $id = $_POST['id'] ?? '';
            
            if(deleteFlower($id)) {
                header('Location: admin.php?status=deleted');
            } else {
                header('Location: admin.php?status=error');
            }
            break;
            
        default:
            header('Location: admin.php?status=invalid_action');
            break;
    }
} else {
    header('Location: admin.php');
}