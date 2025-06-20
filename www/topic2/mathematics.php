<?php
session_start();

// 初始化会话变量
if (!isset($_SESSION['correct_answers'])) {
    $_SESSION['correct_answers'] = 0;
}

if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
}

// 生成随机数学表达式
function generateRandomExpression($maxDigits = 3, $operators = ['+', '-', '*', '/']) {
    $num1 = rand(1, pow(10, $maxDigits));
    $num2 = rand(1, pow(10, $maxDigits));
    $num3 = rand(1, pow(10, $maxDigits));
    $num4 = rand(1, pow(10, $maxDigits));
    $operator = $operators[array_rand($operators)];
    $operator2 = $operators[array_rand($operators)];
    $operator3 = $operators[array_rand($operators)];

    // 确保除法运算不会产生小数
    if ($operator === '/' && ($num2 == 0 || $num4 == 0)) {
        $num2 = rand(1, pow(10, $maxDigits - 1));
        $num4 = rand(1, pow(10, $maxDigits - 1));
    }

    return "$num1 $operator $num2 $operator2 $num3 $operator3 $num4";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userAnswer = $_POST['answer'];
    $expression = $_SESSION['expression'];


    eval('$result = ' . $expression . ';');
    $correctAnswer = intval($result);

    if (intval($userAnswer) === $correctAnswer) {
        $_SESSION['current_question']=1;
        echo "<script>alert('正确');</script>";
    } else {
        $_SESSION['correct_answers']=-1;
        echo "<script>alert('错误');</script>";
    }

    if ($_SESSION['current_question'] == 1) {
        echo "<script>alert('恭喜你！flag是：CTF{Dynamic_Math_Challenge}');</script>";
        session_destroy();
        exit;
    }

    $_SESSION['expression'] = generateRandomExpression();
} else {
    $_SESSION['expression'] = generateRandomExpression();
}

// 设置每三秒刷新页面
header("Refresh: 3");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>动态数学表达式挑战</title>
</head>
<body>
<h1>动态数学表达式挑战</h1>
<p><?php echo htmlspecialchars($_SESSION['expression']); ?></p>
<form method="post">
    <input type="text" name="answer" placeholder="输入答案" required>
    <button type="submit">提交</button>
</form>
</body>
</html>