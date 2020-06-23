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
<?php
session_start();
require_once "database.php";
require_once "class.php";
$vxod = $_POST['login'];
$password = $_POST['password'];
$out = false;
        foreach ($users as $user) {
            if ($vxod == $user['login'] && $password == $user['password']) {
                $admin = new $roles[$user['role']]($user);
                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['login'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['lang'] = $user['language'];
                break;
            }
        }
    if ($admin){
    $admin->Get();
} else 
{
    echo $Lang['error'];
    ?><a href="index.php"><?=$Lang['buton'];?></a><?php
}
?>





