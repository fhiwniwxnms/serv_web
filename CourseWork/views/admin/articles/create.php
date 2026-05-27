<?php include __DIR__ . '/../../../views/layout/admin_header.php'; ?>

<div class="admin-form">
    <h1>Добавить статью</h1>
    <form action="<?= BASE_URL ?>/admin/articles/store" method="post">
        <label>Заголовок:</label>
        <input type="text" name="title" required>

        <label>Текст:</label>
        <textarea name="text" style="min-height:240px" required></textarea>

        <label>Рубрика:</label>
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Сохранить</button>
    </form>
</div>

<?php include __DIR__ . '/../../../views/layout/admin_footer.php'; ?>