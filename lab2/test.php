<?php
$equation = "x*7=49";
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
echo "x = $x";
?>