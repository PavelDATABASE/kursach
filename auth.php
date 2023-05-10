<?php 

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."forhktkntuhpi"); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'root', '', 'register-bd');


$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc(); 


setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

echo " <script>
alert ('Вы успешно вошли!'); 
window.location.href = 'index.php';
</script>";

 ?>