<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Админка' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>

<header>
    <div class="logo">
        <a href="<?= BASE_URL ?>/">🍵 Чайный блог</a>
    </div>
    <nav>
        <a href="<?= BASE_URL ?>/">← На сайт</a>
    </nav>
</header>

<div class="admin-layout">
    <aside class="admin-sidebar">
        <h3>Админ-панель</h3>
        <nav>
            <a href="<?= BASE_URL ?>/admin/articles">📝 Статьи</a>
            <a href="<?= BASE_URL ?>/admin/comments">💬 Комментарии</a>
        </nav>
    </aside>
    <div class="admin-content">