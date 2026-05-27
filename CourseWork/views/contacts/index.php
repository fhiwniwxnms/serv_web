<?php include __DIR__ . '/../../views/layout/header.php'; ?>

<div class="contacts-form">
    <h1>Обратная связь</h1>
    <p class="subtitle">Напишите нам — ответим в течение дня 🍵</p>

    <?php if (isset($errors) && !empty($errors)): ?>
        <ul class="error-list">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <p class="success-msg">Сообщение отправлено! 🍵</p>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/contacts" method="post">
        <label>Имя:</label>
        <input type="text" name="name" value="<?= $old['name'] ?? '' ?>">

        <label>Email:</label>
        <input type="email" name="email" value="<?= $old['email'] ?? '' ?>">

        <label>Сообщение:</label>
        <textarea name="message"><?= $old['message'] ?? '' ?></textarea>

        <button type="submit">Отправить</button>
    </form>
</div>

<?php include __DIR__ . '/../../views/layout/footer.php'; ?>