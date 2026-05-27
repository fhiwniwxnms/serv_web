<?php include __DIR__ . '/../../views/layout/header.php'; ?>

<div class="comment-edit">
    <h2>Редактировать комментарий</h2>
    <form action="<?= BASE_URL ?>/comments/<?= $comment['id'] ?>/update" method="post">
        <textarea name="text"><?= $comment['text'] ?></textarea>
        <button type="submit">Сохранить</button>
    </form>
</div>

<?php include __DIR__ . '/../../views/layout/footer.php'; ?>