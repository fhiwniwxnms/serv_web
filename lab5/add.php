<?php
$notebook_bd = mysqli_connect(
    'sql110.infinityfree.com',  
    'if0_41702370',              
    'qaxbNpLnCeBT',              
    'if0_41702370_notebook' 
);
if (mysqli_connect_errno()) {
    echo 'Ошибка: ' . mysqli_connect_error();
}
mysqli_set_charset($notebook_bd, 'utf8');
if (isset($_POST['button'])) {
    $sql = 'INSERT INTO contacts (surname, name, lastname, gender,
    date, phone, location, email, comment) VALUES 
    ("' . $_POST['surname'] . '", "' . $_POST['name'] . '",
    "' . $_POST['lastname'] . '", "' . $_POST['gender'] . '",
    "' . $_POST['date'] . '", "' . $_POST['phone'] . '",
    "' . $_POST['location'] . '", "' . $_POST['email'] . '",
    "' . $_POST['comment'] . '")';
    $result = mysqli_query($notebook_bd, $sql);
    if (mysqli_errno($notebook_bd) != 0) {
        echo '<p class="error">Ошибка: запись не добавлена. '. mysqli_error($notebook_bd) . '</p>';
    } else {
        echo '<p class="success">Запись добавлена</p>';
    }
}
?>
    <h1>Добавление записи</h1>
    <p>Здесь вы можете добавить новую запись</p>
    <form name="form_add" method="post">
    <div class="column">
        <div class="add">
            <label>Фамилия
                <input type="text" name="surname" placeholder="Фамилия">
            </label> 
        </div>
        <div class="add">
            <label>Имя
                <input type="text" name="name" placeholder="Имя">
            </label>
        </div>
        <div class="add">
            <label>Отчество
                <input type="text" name="lastname" placeholder="Отчество">
            </label>
        </div>
        <div class="add">
            <label>Пол
                <select name="gender">
                    <option value="мужской">Мужской</option>
                    <option value="женский">Женский</option>
                </select>
            </label> 
        </div>
        <div class="add">
            <label>Дата рождения
                <input type="date" name="date">
            </label>
        </div>
        <div class="add">
            <label>Телефон
                <input type="text" name="phone" placeholder="Телефон">
            </label>
        </div>
        <div class="add">
            <label>Адрес
                <input type="text" name="location" placeholder="Адрес"> 
            </label>
        </div>
        <div class="add">
            <label>Email
                <input type="email" name="email" placeholder="Email">
            </label>
        </div>
        <div class="add">
            <label>Комментарий
                <textarea name="comment" placeholder="Краткий комментарий"></textarea>
            </label>
        </div>
        <button type="submit" name="button" class="form-btn">Добавить запись</button>
    </div>
    </form>

