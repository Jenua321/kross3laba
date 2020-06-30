<?php
   require_once 'database.php';

 $login = $_POST['login'];
 $name = $_POST['name'];
 $surname = $_POST['surname'];
 $language = $_POST['language'];
 $role = $_POST['role'];

 $user = mysqli_query($connect, "UPDATE `users` SET `login` = '$login', `name` = '$name', `surname` = 'surname', `language` = '$language', `role` = '$role' WHERE `users`.`id` = '$id'");
 ?>