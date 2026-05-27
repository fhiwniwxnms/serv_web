<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Чайный блог' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>

<header>
    <div class="logo">
        <a href="<?= BASE_URL ?>/">🍵 Чайный блог</a>
    </div>
    <nav>
        <a href="<?= BASE_URL ?>/">Главная</a>
        <a href="<?= BASE_URL ?>/articles">Статьи</a>
        <a href="<?= BASE_URL ?>/picker">Подборщик чая</a>
        <a href="<?= BASE_URL ?>/contacts">Контакты</a>
        <a href="<?= BASE_URL ?>/admin/articles">⚙️ Админка</a>
    </nav>
</header>

<main>