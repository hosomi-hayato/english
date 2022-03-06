<?php
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>question1</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>

<br>
<br>

<p>ログアウトしました。</p>
<a href="login.php">ログイン画面へ</a>
</body>
</html>
