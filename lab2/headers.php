<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="./Logo_Polytech_rus_main.jpg" alt="Логотип МосПолитеха">
        <h1>«Feedback Form» - Цупрун Ангелина Денисовна</h1>
    </header>
    <main>
        <?php
            $url = "https://httpbin.org/post";
            $headers = get_headers($url);
            $res = implode("\n", $headers);
            echo "<textarea class='headers'>$res</textarea>";
        ?>
    </main>
    <footer>
        <p>Задание для самостоятельной работы: «Feedback Form»</p>
    </footer>
</body>
</html>