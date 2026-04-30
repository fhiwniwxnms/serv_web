    <h1>Редактирование записи</h1>
    <p>Здесь вы можете отредактировать любую запись из таблицы</p>
    <div class="a-grid">
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
            $sql = "SELECT id, surname, name FROM contacts ORDER BY surname, name";
            $result = mysqli_query($notebook_bd, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $active = (isset($_GET['id']) && $_GET['id'] == $row['id']) ? ' class="select"' : '';
                echo "<a href='?p=edit&id={$row['id']}'{$active}>{$row['surname']} {$row['name']}</a>";
            }
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            if (isset($_POST['button'])) {
                $sql = "UPDATE contacts SET surname='{$_POST['surname']}', 
                name='{$_POST['name']}', lastname='{$_POST['lastname']}', 
                gender='{$_POST['gender']}', date='{$_POST['date']}',
                phone='{$_POST['phone']}', location='{$_POST['location']}',
                email='{$_POST['email']}', comment='{$_POST['comment']}'
                WHERE id={$id}";
                $result = mysqli_query($notebook_bd, $sql);
                if (mysqli_errno($notebook_bd) != 0) {
                    echo '<p class="error">Ошибка: запись не изменена. '. mysqli_error($notebook_bd) . '</p>';
                } else {
                    echo '<p class="success">Запись изменена</p>';
                }
            }

            if (isset($_GET['id'])) {
                $sql = "SELECT * FROM contacts WHERE id='{$id}'";
                $result = mysqli_query($notebook_bd, $sql);
                $currentRow = mysqli_fetch_assoc($result);
            } else {
                $currentRow = mysqli_fetch_assoc(mysqli_query($notebook_bd, "SELECT * FROM contacts LIMIT 0, 1"));
            }
        ?>
    </div>
    <form name="form_add" method="post" action="?p=edit&id=<?=$currentRow['id'];?>">
    <div class="column">
        <div class="add">
            <label>Фамилия</label> <input type="text" name="surname" placeholder="Фамилия" value="<?=$currentRow['surname'];?>">
        </div>
        <div class="add">
            <label>Имя</label> <input type="text" name="name" placeholder="Имя" value="<?=$currentRow['name'];?>">
        </div>
        <div class="add">
            <label>Отчество</label> <input type="text" name="lastname" placeholder="Отчество" value="<?=$currentRow['lastname'];?>">
        </div>
        <div class="add">
            <label>Пол</label> 
            <select name="gender">
                <option value='<?=$currentRow['gender'];?>'><?=$currentRow['gender'];?></option>
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>
        </div>
        <div class="add">
            <label>Дата рождения</label> <input type="date" name="date" value="<?=$currentRow['date'];?>">
        </div>
        <div class="add">
            <label>Телефон</label> <input type="text" name="phone" placeholder="Телефон" value="<?=$currentRow['phone'];?>">
        </div>
        <div class="add">
            <label>Адрес</label> <input type="text" name="location" placeholder="Адрес" value="<?=$currentRow['location'];?>"> 
        </div>
        <div class="add">
            <label>Email</label> <input type="email" name="email" placeholder="Email" value="<?=$currentRow['email'];?>">
        </div>
        <div class="add">
            <label>Комментарий</label> <textarea name="comment" placeholder="Краткий комментарий"><?=$currentRow['comment'];?></textarea>
        </div>
    <button type="submit" name="button" class="form-btn">Исправить данные для записи №<?=$currentRow['id'];?></button>
    </div>
    </form>