<?php
    include("viewer.php");
    include("menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notebook - index.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php 
            echo getMenu(); 
        ?>
    </header>
    <main>
        <?php 
            if (isset($_GET['type'])) {
                $type = $_GET['type'];
            } else {
                $type = 'byid';
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 0;
            }
            if (isset($_GET['p'])) {
                if ($_GET['p'] == 'viewer') {
                    echo getFriendsList($type, $page);   
                } else if ($_GET['p'] == 'add') {
                    include('add.php');
                } else if ($_GET['p'] == 'edit') {
                    include('edit.php');
                } else if ($_GET['p'] == 'delete') {
                    include('delete.php');
                }
            } else {
                echo getFriendsList($type, $page);
            }
        ?>
    </main>    
</body>
</html>