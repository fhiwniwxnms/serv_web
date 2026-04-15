<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="./Logo_Polytech_rus_main.jpg" alt="Логотип МосПолитеха">
        <h1>«Hello, World!» - Цупрун Ангелина Денисовна</h1>
    </header>
    <main>
        <?php
            $hour = date("H");
            if ($hour >= 0 && $hour < 6) {
                $greeting = "Доброй ночи!";
            } elseif ($hour >= 6 && $hour < 12) {
                $greeting = "Доброе утро!";
            } elseif ($hour >= 12 && $hour < 18) {
                $greeting = "Добрый день!";
            } else {
                $greeting = "Добрый вечер!";
            }
            echo "<p>$greeting</p>";
            echo "<p>Hello, World! I'm Tsuprun Angelina :)</p>"
        ?>
    </main>
    <footer>
        <p>Задание для самостоятельной работы: «Hello, World!»</p>
    </footer>
</body>
</html>