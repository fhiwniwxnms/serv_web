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
        <form action="https://httpbin.org/post" method="POST">
            <div class="field">
                <label for="name">
                  Имя
                </label>
                <input type="text" id="name" name="name" autocomplete="name" minlength="2">
            </div>
            <div class="field">
                <label for="email">
                    Электронная почта
                </label>
                <input type="email" id="email" name="email" autocomplete="email">
            </div>
            <div class="appeal_field">
                <label for="text">
                    Обращение
                </label>
                <select name="appeal" id="appeal">
                    <option value="complaint">Жалоба</option>
                    <option value="offer">Предложение</option>
                    <option value="gratitude">Благодарность</option>
                </select>
                <textarea name="appeal_text" id="appeal_text">Текст обращения</textarea>
            </div>
            <div class="field">
                <p>Куда прислать ответ?</p>
                <div class="checkbox">
                    <div class="option">
                        <label for="op_mess">Сообщение по номеру</label>
                        <input type="checkbox" id="op_mess" name="op_mess" autocomplete="op_mess">
                    </div>
                    <div class="option">
                        <label for="op_email">На Email</label>
                        <input type="checkbox" id="op_email" name="op_email" autocomplete="op_email">
                    </div>
                </div>
            </div>
            <button type="submit" id="submit_btn">Отправить</button>
        </form>
        <a href="headers.php">Результат работы</a>
    </main>
    <footer>
        <p>Задание для самостоятельной работы: «Feedback Form»</p>
    </footer>
</body>
</html>