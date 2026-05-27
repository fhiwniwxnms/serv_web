<?php include __DIR__ . '/../../../views/layout/admin_header.php'; ?>

<h1>Управление статьями</h1>
<a href="<?= BASE_URL ?>/admin/articles/create" class="admin-add-link">+ Добавить статью</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article['id'] ?></td>
            <td><?= $article['title'] ?></td>
            <td><?= $article['created_at'] ?></td>
            <td class="td-actions">
                <a href="<?= BASE_URL ?>/admin/articles/<?= $article['id'] ?>/edit" class="btn">Редактировать</a>
                <form action="<?= BASE_URL ?>/admin/articles/<?= $article['id'] ?>/delete" method="post">
                    <button class="btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../../../views/layout/admin_footer.php'; ?>