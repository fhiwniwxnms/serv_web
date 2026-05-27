<?php include __DIR__ . '/../../views/layout/header.php'; ?>

<div class="picker-form">
    <h1>Подборщик чая</h1>
    <p>Выбери настроение и вкус — я подберу тебе чай 🍵</p>
    <form action="<?= BASE_URL ?>/picker" method="post">
        <div class="picker-fields">
            <div class="field">
                <label>Настроение:</label>
                <select name="mood">
                    <option value="бодрость">Бодрость</option>
                    <option value="расслабление">Расслабление</option>
                    <option value="фокус">Фокус</option>
                    <option value="уют">Уют</option>
                </select>
            </div>
            <div class="field">
                <label>Вкус:</label>
                <select name="flavor">
                    <option value="цветочный">Цветочный</option>
                    <option value="терпкий">Терпкий</option>
                    <option value="сладкий">Сладкий</option>
                    <option value="травяной">Травяной</option>
                </select>
            </div>
            <button type="submit">Подобрать</button>
        </div>
    </form>
</div>

<?php if (isset($results)): ?>
    <h2 class="home-section-title">Результаты:</h2>
    <?php if (empty($results)): ?>
        <p class="no-results">Ничего не найдено 😢 Попробуй другие параметры!</p>
    <?php else: ?>
        <?php foreach ($results as $tea): ?>
            <div class="tea-card">
                <h3><?= $tea['name'] ?></h3>
                <p><?= $tea['description'] ?? '' ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>

<?php include __DIR__ . '/../../views/layout/footer.php'; ?>