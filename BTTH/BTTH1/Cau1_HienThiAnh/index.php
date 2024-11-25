<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 Loại Hoa Tuyệt Đẹp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .flower-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .flower-article {
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>
    <?php require_once 'data.php'; ?>

    <div class="container mt-4">
        <h1 class="text-center mb-4">14 Loại Hoa Tuyệt Đẹp Thích Hợp Trồng Dịp Xuân Hè</h1>

        <div class="text-end mb-3">
            <a href="login.php" class="btn btn-primary">Trang Quản Trị</a>
        </div>


        <?php foreach (getAllFlowers() as $flower): ?>
            <article class="flower-article">
                <h2><?php echo htmlspecialchars($flower['name']); ?></h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo $flower['image']; ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>" class="flower-img">
                    </div>
                    <div class="col-md-8">
                        <p class="mt-3 mt-md-0"><?php echo nl2br(htmlspecialchars($flower['description'])); ?></p>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</body>

</html>