<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="./Logo_Polytech_rus_main.jpg" alt="Логотип МосПолитеха">
        <h1>«Solve the equation» - Цупрун Ангелина Денисовна</h1>
    </header>
    <main>
        <?php
        $equation = "x*7=49";
        echo "<p>Выражение: $equation</p>";
        $parts = explode("=", $equation);
        $left = $parts[0];
        $right = (int)$parts[1];
        if (strpos($left, '+') !== false) {
            $operator = '+';
        } elseif (strpos($left, '-') !== false) {
            $operator = '-';
        } elseif (strpos($left, '*') !== false) {
            $operator = '*';
        } elseif (strpos($left, '/') !== false) {
            $operator = '/';
        }
        $parts = explode($operator, $left);
        $a = $parts[0];
        $b = $parts[1];
        if ($a === 'x') {
            $x_pos = "left";
            $known = (int)$b;
        } else {
            $x_pos = "right";
            $known = (int)$a;
        }
        switch ($operator) {
            case "+":
                $x = $right - $known;
                break;
                
            case "-":
                if ($x_pos == "left") {
                    $x = $right + $known;
                } else {
                    $x = $known - $right;
                }
                break;
                
            case "*":
                $x = $right / $known;
                break;
                
            case "/":
                if ($x_pos == "left") {
                    $x = $right * $known;
                } else {
                    $x = $known / $right;
                }
                break;
        }
        echo "<p>x = $x</p>";
        ?>
        <img src="Block-scheme.png" alt="Блок схема">
    </main>
    <footer>
        <p>Задание для самостоятельной работы: «Solve the equation»</p>
    </footer>
</body>
</html>