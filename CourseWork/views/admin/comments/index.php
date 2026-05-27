<?php include __DIR__ . '/../../../views/layout/admin_header.php'; ?>

<h1>Управление комментариями</h1>

<table>
    <thead>
        <tr>
            <th>Автор</th>
            <th>Комментарий</th>
            <th>Статья</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment): ?>
        <tr>
            <td><?= $comment['nickname'] ?></td>
            <td><?= $comment['text'] ?></td>
            <td><?= $comment['article_title'] ?></td>
            <td><?= $comment['created_at'] ?></td>
            <td>
                <form action="<?= BASE_URL ?>/admin/comments/<?= $comment['id'] ?>/delete" method="post">
                    <button class="btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../../../views/layout/admin_footer.php'; ?>