<?php
session_start();
class User
{
    protected $name;
    protected $surname;
}
class Admin  extends User
{
    public function Get()
    {
        if($_SESSION['NowLang'] == "ru") {
            echo "Здравствуйте, Админ " . $this->name . " " . $this->surname . ". Вы можете на сайте изменять, удалять и создавать клиентов.";
            echo '<a href="tableus.php">Админка</a>';
        }
        elseif ($_SESSION['NowLang'] == "ua"){
            echo "Вітаю, Адмін ". $this->name . " " . $this->surname . ". Ви можете на сайті змінювати, видаляти і створювати клієнтів.";
            echo '<a href="tableus.php">Админка</a>';
            
        }
        else{
            echo "Hello, Admin " . $this->name . " " . $this->surname . ". You can modify, delete and create clients on the site.";
            echo '<a href="tableus.php">Админка</a>'
            ;
        }
    }
}
class Manager  extends User
{
    public function Get()
    {
        if ($_SESSION['NowLang'] == "ru") {
            echo "Здравствуйте, Менеджер " . $this->name . " " . $this->surname . ". Вы можете на сайте изменять, удалять и создавать клиентов.";
            echo '<a href="tableus.php">Managerka</a>';
            
        } elseif ($_SESSION['NowLang'] == "ua") {
            echo "Вітаю, Менеджер " . $this->name . " " . $this->surname . ". Ви можете на сайті змінювати, видаляти і створювати клієнтів.";
            echo '<a href="tableus.php">Managerka</a>';
            
        } else {
            echo "Hello, Manager " . $this->name . " " . $this->surname . ". You can modify, delete and create clients on the site.";
            echo '<a href="tableus.php">Managerka</a>';
            
        }
    }
}
class Client extends  User
{
    public function Get()
    {
        if ($_SESSION['NowLang'] == "ru") {
            echo "Здравствуйте, Клиент " . $this->name . " " . $this->surname . ". Вы можете на сайте просматривать информацию доступную пользователям.";
            
        } elseif ($_SESSION['NowLang'] == "ua") {
            echo "Вітаю, Кліент " . $this->name . " " . $this->surname . ". Ви можете на сайті переглядати інформацію доступну користувачам.";
            
        } else {
            echo "Hello, Client " . $this->name . " " . $this->surname . ". You can view information available to users on the site.";
            
        }
    }
}
$roles = [
        'admin' => admin::class,
        'manager' => manager::class,
        'client' => client::class,
    ];
?>