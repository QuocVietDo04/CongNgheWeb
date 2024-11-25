<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php require_once 'data.php'; ?>
    
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Products</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
                Add Product
            </button>
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
                <?php foreach (getAllProducts() as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td>
                        <img src="<?php echo $product['image']; ?>" class="product-image" alt="Product">
                    </td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo number_format($product['price']); ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn" 
                                data-id="<?php echo $product['id']; ?>"
                                data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                data-price="<?php echo $product['price']; ?>"
                                data-image="<?php echo $product['image']; ?>">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger delete-btn" 
                                data-id="<?php echo $product['id']; ?>">
                            Delete
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="current_image" value="">
                        
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <div id="currentImage" class="mt-2" style="display: none;">
                                <img src="" alt="Current image" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <form action="process.php" method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Xử lý sự kiện nút Edit
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.querySelector('#productModal');
                const form = modal.querySelector('form');
                
                form.querySelector('[name="action"]').value = 'update';
                form.querySelector('[name="id"]').value = this.dataset.id;
                form.querySelector('[name="name"]').value = this.dataset.name;
                form.querySelector('[name="price"]').value = this.dataset.price;
                form.querySelector('[name="current_image"]').value = this.dataset.image;
                
                // Hiển thị ảnh hiện tại
                const currentImage = modal.querySelector('#currentImage');
                currentImage.style.display = 'block';
                currentImage.querySelector('img').src = this.dataset.image;
                
                const modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.show();
                } else {
                    new bootstrap.Modal(modal).show();
                }
            });
        });

        // Xử lý sự kiện nút Delete
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.querySelector('#deleteModal');
                modal.querySelector('[name="id"]').value = this.dataset.id;
                new bootstrap.Modal(modal).show();
            });
        });

        // Reset form khi đóng modal
        document.querySelector('#productModal').addEventListener('hidden.bs.modal', function() {
            this.querySelector('form').reset();
            this.querySelector('[name="action"]').value = 'add';
            this.querySelector('[name="id"]').value = '';
            this.querySelector('[name="current_image"]').value = '';
            this.querySelector('#currentImage').style.display = 'none';
        });
    </script>
</body>
</html>