<?php
function trig_sin($deg)  { return sin(deg2rad((float)$deg)); }
function trig_cos($deg)  { return cos(deg2rad((float)$deg)); }
function trig_tan($deg)  { return tan(deg2rad((float)$deg)); }
function trig_cot($deg) {
    $s = sin(deg2rad((float)$deg));
    if (abs($s) < 1e-12) return null;
    return cos(deg2rad((float)$deg)) / $s;
}
function trig_asin($val) { return rad2deg(asin((float)$val)); }
function trig_acos($val) { return rad2deg(acos((float)$val)); }
function trig_atan($val) { return rad2deg(atan((float)$val)); }

function callTrig($name, $param) {
    $fn = 'trig_' . strtolower($name); // символическая ссылка на функцию
    if (!function_exists($fn)) return null;
    return $fn((float)$param);
}
