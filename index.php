<?php
@session_start();
$LangArray = array("ru", "ua", "en");
$DefaultLang = "ru";
if(@$_SESSION['NowLang']) 
{
    if(!in_array($_SESSION['NowLang'], $LangArray)) 
    {
        $_SESSION['NowLang'] = $DefaultLang;
    }
}
else {
    $_SESSION['NowLang'] = $DefaultLang;
}
$language = addslashes($_GET['lang']);
if($language) 
{
    if(!in_array($language, $LangArray)) 
    {
      
        $_SESSION['NowLang'] = $DefaultLang; 
    }
    else 
    {
        $_SESSION['NowLang'] = $language;
    }
}
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang.".$CurentLang.".php");
?>

<!doctype html>
<html>
<body>
    <h1><label><? echo $Lang['title_lan']?></label><h1>
	<h3>
		<form method="post" action="login.php">
            <label><? echo $Lang['login_lan']?></label>
		<br><input type="text" name="login"><br>
            <label><? echo $Lang['pass_lan']?></label>
		<br><input type="password" name="password">
		<br><button type="submit"><? echo $Lang['button_lan']?></button>
            <br>  <a href="index.php?lang=ru">Ru</a>
              <a href="index.php?lang=ua">Ua</a>
            <a href="index.php?lang=en">En</a>
	<h3>
	</form>
</body>
</html>