<?php
session_start();

if (!isset($_SESSION['user_answers'])) {
    header('Location: index.php');
    exit;
}

$questions = file('questions.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$userAnswers = $_SESSION['user_answers'];

$correctCount = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Bài Tập Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .correct-answer { color: green; font-weight: bold; }
        .wrong-answer { color: red; text-decoration: line-through; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Kết Quả Bài Tập Trắc Nghiệm</h1>
        <?php
        $questionCount = 0;
        for ($i = 0; $i < count($questions); $i += 6) {
            $questionCount++;
            $question = $questions[$i];
            $correctAnswer = substr($questions[$i + 5], -1);
            $userAnswer = $userAnswers[$questionCount] ?? '';

            echo "<div class='card mb-4'>";
            echo "<div class='card-header'><strong>$question</strong></div>";
            echo "<div class='card-body'>";
            for ($j = 1; $j <= 4; $j++) {
                $answer = $questions[$i + $j];
                $letter = chr(64 + $j); // A, B, C, D
                $class = '';
                if ($letter === $correctAnswer) {
                    $class = 'correct-answer';
                } elseif ($letter === $userAnswer && $userAnswer !== $correctAnswer) {
                    $class = 'wrong-answer';
                }
                echo "<div class='$class'>$answer</div>";
            }
            echo "</div></div>";

            if ($userAnswer === $correctAnswer) {
                $correctCount++;
            }
        }
        ?>
        <div class="alert alert-info">
            Bạn trả lời đúng <?php echo $correctCount; ?> / <?php echo $questionCount; ?> câu hỏi.
        </div>
        <a href="index.php?reset=1" class="btn btn-primary">Làm lại</a>
    </div>
</body>
</html>
