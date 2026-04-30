    <h1>Удаление записей</h1>
    <p>При нажатии на запись она удаляется</p>
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
            $sql = "SELECT id, surname, name, lastname FROM contacts ORDER BY surname, name";
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $res = mysqli_query($notebook_bd, "SELECT surname FROM contacts WHERE id={$id}");
                $deleteRow = mysqli_fetch_assoc($res);
                $surname = $deleteRow['surname'];
                mysqli_query($notebook_bd, "DELETE FROM contacts WHERE id={$id}");
                echo "<p class='success'>Запись с фамилией {$surname} удалена</p>";
            }
            $result = mysqli_query($notebook_bd, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $name_initial = mb_substr($row['name'], 0, 1);
                $lastname_initial = mb_substr($row['lastname'], 0, 1);
                echo "<a href='?p=delete&id={$row['id']}'>{$row['surname']} {$name_initial}. {$lastname_initial}.</a>";
            }
        ?>
    </div>