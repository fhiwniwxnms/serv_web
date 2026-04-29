<?php
    function getMenu() {
        $ret = "";
        $p    = $_GET['p']    ?? '';
        $type = $_GET['type'] ?? 'byid';

        $isViewer = $p == 'viewer' || $p == '';

        $class_v = $isViewer       ? 'select' : '';
        $class_a = ($p == 'add')   ? 'select' : '';
        $class_e = ($p == 'edit')  ? 'select' : '';
        $class_d = ($p == 'delete')? 'select' : '';

        $ret .= "<a href='?p=viewer' class='{$class_v}'>Просмотр записей</a>";

        if ($isViewer) {
            $c_id    = ($type == 'byid')  ? 'select' : '';
            $c_fam   = ($type == 'fam')   ? 'select' : '';
            $c_birth = ($type == 'birth') ? 'select' : '';
            $ret .= "<div class='submenu'>";
            $ret .= "<a href='?p=viewer&type=byid'  class='{$c_id}'>По ID</a>";
            $ret .= "<a href='?p=viewer&type=fam'   class='{$c_fam}'>По фамилии</a>";
            $ret .= "<a href='?p=viewer&type=birth' class='{$c_birth}'>По дате рождения</a>";
            $ret .= "</div>";
        }

        $ret .= "<a href='?p=add'    class='{$class_a}'>Добавление записи</a>";
        $ret .= "<a href='?p=edit'   class='{$class_e}'>Редактирование записи</a>";
        $ret .= "<a href='?p=delete' class='{$class_d}'>Удаление записи</a>";

        return $ret;
    }
?>