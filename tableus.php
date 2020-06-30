<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Users</title>
</head>
<style>
	th, td 
	{
		padding: 10px;
	}
	th
	{
		background: #606060;
	}
	td
	{
		background: #b5b5b5;
	}
</style>
<body>
     <table>
     	<tr>
     		<th>id</th>
     		<th>login</th>
     		<th>name</th>
     		<th>surname</th>
     		<th>language</th>
     		<th>role</th>
     	</tr>
     	<?php

     	require_once "database.php";
     	  $info = mysqli_query($connect, $sql);
     	  $info = mysqli_fetch_all($info);
        if(isset($_GET['del'])){
            $id = ($_GET['del']);

            mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

        }
     	  foreach ($info as $users) 
     	  {
     	  	echo '
     	  	<tr>
     	  	<td>'. $users[0] .'</td>
     		<td>'. $users[1] .'</td>
     		<td>'. $users[3] .'</td>
     		<td>'. $users[4] .'</td>
     		<td>'. $users[5] .'</td>
     		<td>'. $users[6] .'</td>
     		';
     	  	if($_SESSION['role'] == 'admin') 
     	  	{
                echo '<td>' . '<a href="edit.php?id=<?$users[0]?>">Edit</a>';
                echo '</td>'; ?>
                <td><a href="tableus.php?del=<?= $users[0] ?>>">Dell</a></td> <?php
            }
     	  }
     	 ?>
         </tr>
     </table>
     <br><th><a href="add.php">Добавить</a></th></br>
     <br><th><a href="index.php">Выход</a></th></br>
</body>
</html>