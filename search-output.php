<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>検索結果</title>
<link rel="stylesheet" href="css/search.css">

</head>
<body>
<?php
switch ($_REQUEST['1']) {

case 'person':

   echo'<br>';

 require 'controller/person.php'; 

   echo'<br>';

	break;
case 'verb':

   echo'<br>';

 require 'controller/verb.php'; 

   echo'<br>';

	break;
case 'interrogative':

   echo'<br>';

 require 'controller/interrogative.php'; 

   echo'<br>';

	break;
case 'ajective':

   echo'<br>';

 require 'controller/ajective.php'; 

   echo'<br>';

	break;
case 'others':

   echo'<br>';

 require 'controller/others.php'; 


    echo'<br>';

	break;





}

echo'<div class="box1">';
     echo'<a href="search-input.php">検索画面に戻る</a>';
echo'</div>';

  echo'<br>';

echo'<div class="box2">';
     echo'<a href="main.php">メイン画面に戻る</a>';
echo'</div>';


?>
</form>
</body>
</html>
