<?php
session_start();


?>

<?php

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
$_SESSION['year'] = $_POST['year'];
$_SESSION['class'] = $_POST['class'];
$_SESSION['number_id'] = $_POST['number_id'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['password'] = $_POST['password'];
} elseif (
$_SERVER["REQUEST_METHOD"] === 'GET' &&
!isset(
$_SESSION['year'],
$_SESSION['class'],
$_SESSION['number_id'],
$_SESSION['name'],
$_SESSION['password']
)
) {
throw new Exception();
}



$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
'staff','password');
$sql=$pdo->prepare('select * from user_table where year=? and class=? and
number_id=? and name=? and password=?');

$sql->execute([$_SESSION['year'],$_SESSION['class'],$_SESSION['number_id'],$_SESSION['name'],$_SESSION['password']]
);
foreach ($sql as $row) {
	$_SESSION['user_table']=[
		'year'=>$row['year'], 'class'=>$row['class'],
		'number_id'=>$row['number_id'], 'name'=>$row['name'],
		'password'=>$row['password']];
}




?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>メイン画面</title>

<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/main.css">

</head>
<body>

<?php require '../header.php';?>

<br>
<div class=box1>
     <p>英単語データベース</p>
</div>


<?php




if(isset($_SESSION['user_table'])){
  if($_SESSION["name"]=="Teacher"){

  

    

     print_r('<br>');


    echo'<div class="box2">';
     echo'<a href="search-input.php">英単語検索</a>';
     echo'</div>';
     print_r('<br>');

    echo' <div class="box3">';
     echo' <a href="question1-input.php">問題1</a>';
    
     echo"     ";
    
     echo'<a href="question2-input.php">問題2</a>';
    echo'</div>';

    echo' <div class="box4">';
     echo' <a href="question3-input.php">問題3</a>';
     echo"     ";
     echo'<a href="question4-input.php">問題4</a>';
    echo'</div>';

    echo' <div class="box5">';
     echo' <a href="question5-input.php">問題5</a>';
     echo"     ";
     echo'<a href="question6-input.php">問題6</a>';
    echo'</div>';

   print_r('<br>');
   print_r('<br>');

    echo'<div class="box6">';
      echo'<a href="edit.php">英単語データベース編集</a>';
      echo"     ";
      echo'<a href="student.php">生徒編集</a>';
    echo'</div>';



    echo'<div class="box7">';
     echo'<a href="logout.php">ログアウト</a>';
    echo'</div>';
echo'</form>';

}else{


   
     print_r('<br>');
    echo'<div class="box2">';
     echo'<a href="search-input.php">英単語検索</a>';
     echo'</div>';
     print_r('<br>');

    echo' <div class="box3">';
     echo' <a href="question1-input.php">問題1</a>';
     echo"     ";
     echo'<a href="question2-input.php">問題2</a>';
    echo'</div>';

    echo' <div class="box4">';
     echo' <a href="question3-input.php">問題3</a>';
     echo"     ";
     echo'<a href="question4-input.php">問題4</a>';
    echo'</div>';

    echo' <div class="box5">';
     echo' <a href="question5-input.php">問題5</a>';
     echo"     ";
     echo'<a href="question6-input.php">問題6</a>';
    echo'</div>';

   print_r('<br>');
   print_r('<br>');


   
    echo'<div class="box8">';
     echo'<a href="logout.php">ログアウト</a>';
    echo'</div>';

}
}else{
echo "入力が間違っています";
 echo'<div class="box9">';
     echo'<a href="login.php">ログイン画面へ</a>';
    echo'</div>';

}
?>
</body>
</html>
