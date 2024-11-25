<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Hoa - Trang Quản Trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .flower-thumb {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
    ?>
    <?php require_once 'data.php'; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Quản Lý Hoa</h1>
        <div>
            <a href="index.php" class="btn btn-secondary me-2">Xem Trang Chủ</a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#flowerModal">
                Thêm Hoa Mới
            </button>
            <a href="logout.php" class="btn btn-danger ms-2">Đăng xuất</a>
        </div>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên Hoa</th>
                    <th>Mô Tả</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (getAllFlowers() as $flower): ?>
                    <tr>
                        <td><?php echo $flower['id']; ?></td>
                        <td>
                            <img src="<?php echo $flower['image']; ?>" class="flower-thumb" alt="<?php echo htmlspecialchars($flower['name']); ?>">
                        </td>
                        <td><?php echo htmlspecialchars($flower['name']); ?></td>
                        <td><?php echo mb_strimwidth(htmlspecialchars($flower['description']), 0, 100, "..."); ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-btn"
                                data-id="<?php echo $flower['id']; ?>"
                                data-name="<?php echo htmlspecialchars($flower['name']); ?>"
                                data-description="<?php echo htmlspecialchars($flower['description']); ?>"
                                data-image="<?php echo $flower['image']; ?>">
                                Sửa
                            </button>
                            <button class="btn btn-sm btn-danger delete-btn"
                                data-id="<?php echo $flower['id']; ?>">
                                Xóa
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="flowerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông Tin Hoa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="current_image" value="">

                        <div class="mb-3">
                            <label class="form-label">Tên Hoa</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô Tả</label>
                            <textarea class="form-control" name="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <div id="currentImage" class="mt-2" style="display: none;">
                                <img src="" alt="Ảnh hiện tại" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
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
                    <h5 class="modal-title">Xác Nhận Xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa loài hoa này?
                </div>
                <form action="process.php" method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Xử lý nút Edit
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.querySelector('#flowerModal');
                const form = modal.querySelector('form');

                form.querySelector('[name="action"]').value = 'update';
                form.querySelector('[name="id"]').value = this.dataset.id;
                form.querySelector('[name="name"]').value = this.dataset.name;
                form.querySelector('[name="description"]').value = this.dataset.description;
                form.querySelector('[name="current_image"]').value = this.dataset.image;

                const currentImage = modal.querySelector('#currentImage');
                currentImage.style.display = 'block';
                currentImage.querySelector('img').src = this.dataset.image;

                new bootstrap.Modal(modal).show();
            });
        });

        // Xử lý nút Delete
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.querySelector('#deleteModal');
                modal.querySelector('[name="id"]').value = this.dataset.id;
                new bootstrap.Modal(modal).show();
            });
        });

        // Reset form khi đóng modal
        document.querySelector('#flowerModal').addEventListener('hidden.bs.modal', function() {
            this.querySelector('form').reset();
            this.querySelector('[name="action"]').value = 'add';
            this.querySelector('[name="id"]').value = '';
            this.querySelector('[name="current_image"]').value = '';
            this.querySelector('#currentImage').style.display = 'none';
        });
    </script>
</body>

</html>