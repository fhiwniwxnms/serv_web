<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="./Logo_Polytech_rus_main.jpg" alt="Логотип МосПолитеха">
        <h1>«Calculator» - Цупрун Ангелина Денисовна</h1>
    </header>
    <main>
        <div class="exp_field">
            <form action="" method="post">
                <input name="exp_field" id="exp_field" placeholder="0" value="0" readonly>
                <div class="submit">
                    <button id="equal" value="=" type="submit">=</button>
                </div>
                <div id="result">
                    
                </div>
            </form>
        </div>
        <div class="digits">
            <button id="0" class="digit" value="0">0</button>
            <button id="1" class="digit" value="1">1</button>
            <button id="2" class="digit" value="2">2</button>
            <button id="3" class="digit" value="3">3</button>
            <button id="4" class="digit" value="4">4</button>
            <button id="5" class="digit" value="5">5</button>
            <button id="6" class="digit" value="6">6</button>
            <button id="7" class="digit" value="7">7</button>
            <button id="8" class="digit" value="8">8</button>
            <button id="9" class="digit" value="9">9</button>
        </div>
        <div class="operations">
            <button id="bracet_r" class="operation" value="(">(</button>
            <button id="bracet_l" class="operation" value=")">)</button>
            <button id="plus" class="operation" value="+">+</button>
            <button id="minus" class="operation" value="-">-</button>
            <button id="multi" class="operation" value="*">*</button>
            <button id="divide" class="operation" value="/">/</button>
        </div> 
        <div class="clear_btns">
            <button id="clear" class="clear">C</button>
            <button id="abs_clear" class="clear">AC</button>
        </div>
        <?php
            if (isset($_POST['exp_field'])) {
                $res = 0;
                $digits = explode('+', $_POST['exp_field']);
                foreach ($digits as $digit) {
                    $res += (int) $digit;
                }
                echo $res;
            }
        ?>
    </main>
    <footer>
        <p>Задание для самостоятельной работы: «Calculator»</p>
    </footer>
    <script src="main.js"></script>
</body>
</html>