<?php

require __DIR__ . '/src/settings.php';

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    require $path;
});

$routes = require __DIR__ . '/src/routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');
$uri = preg_replace('~^web_labs_tsuprun/lab8/~', '', $uri);

foreach ($routes as $pattern => $handler) {
    if (preg_match($pattern, $uri, $matches)) {
        array_shift($matches);
        [$controllerClass, $method] = $handler;
        $controller = new $controllerClass();
        $controller->$method(...$matches);
        exit;
    }
}

http_response_code(404);
echo '404 - Страница не найдена';