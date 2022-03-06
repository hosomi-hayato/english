

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>正答数</title>
<link rel="stylesheet" href="css/question.css">
<link rel="stylesheet" href="style.css">
</head>
<body>


<?php


$count=0;
switch ($_REQUEST['1']) {
case 'must':
	$count++;
	break;
case 'past':
	break;
case 'have':
	break;
case 'ing':
	break;


}

switch ($_REQUEST['2']) {
case 'must':

	break;
case 'past':
	break;
case 'have':
	break;
case 'ing':
	$count++;
	break;

	



}

switch ($_REQUEST['3']) {
case 'must':

	break;
case 'past':
	$count++;
	break;
case 'have':
	break;
case 'ing':
	break;




}

switch ($_REQUEST['4']) {
case 'must':

	break;
case 'past':
	break;
case 'have':
	$count++;
	break;
case 'ing':
	break;



}

switch ($_REQUEST['5']) {
case 'must':
	$count++;
	break;
case 'past':
	break;
case 'have':
	break;
case 'ing':
	break;



}

echo '5問中'.$count.'問正解';
print_r('<br>');
if($count>=3){
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
