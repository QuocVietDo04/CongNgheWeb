<?php
session_start();

// Đọc câu hỏi từ file
$questions = file('questions.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Xử lý form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userAnswers = $_POST['answers'] ?? [];
    $_SESSION['user_answers'] = $userAnswers;
    header('Location: result.php');
    exit;
}

// Reset session nếu đang làm lại
if (isset($_GET['reset'])) {
    unset($_SESSION['user_answers']);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Bài Tập Trắc Nghiệm</h1>
        <form method="post">
            <?php
            $questionCount = 0;
            for ($i = 0; $i < count($questions); $i += 6) {
                $questionCount++;
                $question = $questions[$i];
                echo "<div class='card mb-4'>";
                echo "<div class='card-header'><strong>$question</strong></div>";
                echo "<div class='card-body'>";
                for ($j = 1; $j <= 4; $j++) {
                    $answer = $questions[$i + $j];
                    $letter = chr(64 + $j); // A, B, C, D
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='answers[$questionCount]' value='$letter' id='question{$questionCount}_{$letter}'>";
                    echo "<label class='form-check-label' for='question{$questionCount}_{$letter}'>$answer</label>";
                    echo "</div>";
                }
                echo "</div></div>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
</body>
</html>