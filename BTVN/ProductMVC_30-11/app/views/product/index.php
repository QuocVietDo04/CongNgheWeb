<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image { max-width: 100px; max-height: 100px; object-fit: cover; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Products</h2>
            <a href="index.php?controller=product&action=create" class="btn btn-primary">Add Product</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><img src="<?php echo $product['image']; ?>" class="product-image" alt="Product"></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo number_format($product['price']); ?></td>
                    <td>
                        <a href="index.php?controller=product&action=edit&id=<?php echo $product['id']; ?>" 
                           class="btn btn-sm btn-warning">Edit</a>
                        <form action="index.php?controller=product&action=delete" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>