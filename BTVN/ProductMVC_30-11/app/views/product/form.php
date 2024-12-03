<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($product) ? 'Edit' : 'Add'; ?> Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2><?php echo isset($product) ? 'Edit' : 'Add'; ?> Product</h2>
        <form action="index.php?controller=product&action=<?php echo isset($product) ? 'update' : 'store'; ?>" 
              method="POST" enctype="multipart/form-data">
            <?php if (isset($product)): ?>
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="current_image" value="<?php echo $product['image']; ?>">
            <?php endif; ?>
            
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" 
                       value="<?php echo isset($product) ? htmlspecialchars($product['name']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" 
                       value="<?php echo isset($product) ? $product['price'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image" accept="image/*">
                <?php if (isset($product) && $product['image']): ?>
                    <div class="mt-2">
                        <img src="<?php echo $product['image']; ?>" alt="Current image" style="max-width: 200px;">
                    </div>
                <?php endif; ?>
            </div>
            
            <a href="index.php?controller=product&action=index" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>