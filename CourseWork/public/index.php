<?php
$uri = $_SERVER['REQUEST_URI'];
$basePath = '/web_labs_tsuprun/CourseWork/public';
$uri = str_replace($basePath, '', $uri);
define('BASE_URL', $basePath);

// Ядро
require_once __DIR__ . '/../src/Core/Db.php';
require_once __DIR__ . '/../src/Core/Router.php';

// Интерфейсы
require_once __DIR__ . '/../src/Interfaces/Filterable.php';

// Модели
require_once __DIR__ . '/../src/Models/AbstractModel.php';
require_once __DIR__ . '/../src/Models/User.php';
require_once __DIR__ . '/../src/Models/Category.php';
require_once __DIR__ . '/../src/Models/Article.php';
require_once __DIR__ . '/../src/Models/Comment.php';
require_once __DIR__ . '/../src/Models/Tea.php';

// Контроллеры (автозагрузка)
spl_autoload_register(function($class) {
    require_once __DIR__ . "/../src/Controllers/$class.php";
});

require_once __DIR__ . '/../routes.php';