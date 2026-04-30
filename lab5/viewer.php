<?php
    function getFriendsList ($type, $page) {
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
        $order = 'id';
        if ($type == 'fam') {
            $order = 'surname';
        } else if ($type == 'birth') {
            $order = 'date';
        }
        $rows_count = mysqli_fetch_row(mysqli_query($notebook_bd,'SELECT COUNT(*) FROM contacts'));
        $pages = ceil($rows_count[0] / 10);
        $start = $page * 10;
        $result = mysqli_query($notebook_bd, "SELECT * FROM contacts ORDER BY {$order}  LIMIT {$start}, 10");
        $ret = '<table>';
        $ret .= '<tr>
                    <th>#</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    <th>Телефон</th>
                    <th>Адрес</th>
                    <th>Email</th>
                    <th>Комментарий</th>
                </tr>';
        $counter = $start + 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $ret .= "<tr>
            <td>{$counter}</td>
            <td>{$row['surname']}</td>
            <td>{$row['name']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['date']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['location']}</td>
            <td>{$row['email']}</td>
            <td>{$row['comment']}</td>
            </tr>";
            $counter++;
        }
        $ret .= '</table>';
        $ret .= '<div class="pagination">';
        for ($i = 0; $i < $pages; $i++) {
            $num = $i + 1;
            if ($i == $page) {
                $ret .= "<span>{$num}</span>";
            } else {
                $ret .= "<a href='?p=viewer&page={$i}&type={$type}'>{$num}</a>";
            }
        }
        $ret .= '</div>';
        return $ret;
    }
?>