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
                    <?php if (isset($_GET['result'])): ?>
                        <?php echo htmlspecialchars((string)$_GET['result'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
                    <?php endif; ?>
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
        session_start();
        if (!isset($_SESSION['history'])) {
            $_SESSION['history'] = array();
        }


        function isnum($x) {
            if ($x === '' || $x === null) return false;
            if ($x[0] === '-') {
                $x = substr($x, 1);
                if ($x === '') return false;
            }
            if ($x[0] === '.' || $x[strlen($x) - 1] === '.') return false;
            for ($i = 0, $point = 0; $i < strlen($x); $i++) {
                $ch = $x[$i];
                if ($ch === '.') {
                    $point++;
                    if ($point > 1) return false;
                    continue;
                }
                if ($ch < '0' || $ch > '9') return false;
            }
            if (strlen($x) >= 2 && $x[0] === '0' && $x[1] !== '.') return false;
            return true;
        }
        function calculate($val) {
            if ($val === '' || $val === null) return 'Выражение не задано!';
            if (isnum($val)) return $val;
            $args = explode('+', $val);
            if (count($args) > 1) {
                $sum = 0;
                for ($i = 0; $i < count($args); $i++) {
                    $arg = calculate($args[$i]);
                    if (!isnum($arg)) return $arg;
                    $sum += (float)$arg;
                }
                return (string)$sum;
            }
            if ($val[0] === '-') $val = '0' . $val;
            $args = explode('-', $val);
            if (count($args) > 1) {
                $first = calculate($args[0]);
                if (!isnum($first)) return $first;
                $res = (float)$first;
                for ($i = 1; $i < count($args); $i++) {
                    $arg = calculate($args[$i]);
                    if (!isnum($arg)) return $arg;
                    $res -= (float)$arg;
                }
                return (string)$res;
            }
            $args = explode('*', $val);
            if (count($args) > 1) {
                $sup = 1;
                for ($i = 0; $i < count($args); $i++) {
                    $arg = calculate($args[$i]);
                    if (!isnum($arg)) return $arg;
                    $sup *= (float)$arg;
                }
                return (string)$sup;
            }
            $val = str_replace(':', '/', $val);
            $args = explode('/', $val);
            if (count($args) > 1) {
                $first = calculate($args[0]);
                if (!isnum($first)) return $first;
                $res = (float)$first;
                for ($i = 1; $i < count($args); $i++) {
                    $arg = calculate($args[$i]);
                    if (!isnum($arg)) return $arg;
                    if ((float)$arg == 0.0) return 'Деление на ноль!';
                    $res /= (float)$arg;
                }
                return (string)$res;
            }
            return 'Недопустимые символы в выражении!';
        }
        function SqValidator($val) {
            $open = 0;
            for ($i = 0; $i < strlen($val); $i++) {
                if ($val[$i] === '(') $open++;
                else if ($val[$i] === ')') {
                    $open--;
                    if ($open < 0) return false;
                }
            }
            return $open === 0;
        }

        function calculateSq($val) {
            if (!SqValidator($val)) return 'Неправильная расстановка скобок!';
            $start = strpos($val, '(');
            if ($start === false) return calculate($val);
            $end = $start + 1;
            $open = 1;
            while ($open && $end < strlen($val)) {
                if ($val[$end] === '(') $open++;
                if ($val[$end] === ')') $open--;
                $end++;
            }
            $inside = substr($val, $start + 1, $end - $start - 2);
            $inside_res = calculateSq($inside);
            if (!isnum($inside_res)) return $inside_res;
            $new_val = substr($val, 0, $start) . $inside_res . substr($val, $end);
            return calculateSq($new_val);
        }
        function formatResult($res) {
            if (!isnum($res)) return (string)$res;
            $v = (float)$res;
            $text = rtrim(rtrim(number_format($v, 10, '.', ''), '0'), '.');
            return $text === '' ? '0' : $text;
        }
        if (isset($_POST['exp_field'])) {
            $expr = trim((string)$_POST['exp_field']);
            $bad = '';
            for ($i = 0; $i < strlen($expr); $i++) {
                $ch = $expr[$i];
                $ok = ($ch >= '0' && $ch <= '9') || $ch === '.' || $ch === '+' || $ch === '-' || $ch === '*' || $ch === '/' || $ch === ':' || $ch === '(' || $ch === ')' || $ch === ' ';
                if (!$ok) { $bad = $ch; break; }
            }
            if ($expr === '') {
                $out = 'Выражение не задано!';
            } else if ($bad !== '') {
                $out = 'Недопустимый символ: ' . $bad;
            } else {
                $expr_nospace = str_replace(' ', '', $expr);
                $res = calculateSq($expr_nospace);
                $out = formatResult($res);
            }
            $_SESSION['history'][] = $expr . ' = ' . $out;
            header('Location: index.php?result=' . urlencode($out));
            exit;
        }
        ?>
    </main>
    <footer>
        <p>Задание для самостоятельной работы: «Calculator»</p>
        <div class="history">
            <?php foreach ($_SESSION['history'] as $line): ?>
                <div><?php echo htmlspecialchars((string)$line, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></div>
            <?php endforeach; ?>
        </div>
    </footer>
    <script src="main.js"></script>
</body>
</html>