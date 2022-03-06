

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<link rel="stylesheet" href="css/question.css">
<link rel="stylesheet" href="style.css">
</head>
<body>


<?php


$count=0;
switch ($_REQUEST['1']) {
case '水':
	$count++;
	break;
case '気体':
	break;
case '固体':
	break;
case '氷':
	break;


}

switch ($_REQUEST['2']) {
case '水':

	break;
case '気体':
$count++;
	break;
case '固体':

	break;
case '氷':

	break;



}

switch ($_REQUEST['3']) {
case '水':

	break;
case '気体':

	break;
case '固体':
$count++;
	break;
case '氷':

	break;



}

switch ($_REQUEST['4']) {
case '水':

	break;
case '気体':
$count++;
	break;
case '固体':

	break;
case '氷':

	break;



}

switch ($_REQUEST['5']) {
case '水':

	break;
case '気体':

	break;
case '固体':
$count++;
	break;
case '氷':

	break;



}
print_r('<br>');
echo '5問中'.$count.'問正解';

if($count>=3){
print_r('<br>');
echo '合格です';
}else {

echo '不合格です';
}
print_r('<br>');


echo'<div class="box">';
     echo'<a href="main.php">メイン画面に戻る</a>';
echo'</div>';

?>

</body>
</html>
