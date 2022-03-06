<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>その他検索結果</title>
<link rel="stylesheet" href="css/search.css">

</head>
<body>

<table>
<tr><th>単語</th><th>意味</th><th>例文</th><th>和訳</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');
$sql=$pdo->prepare('select * FROM  others_table where word like ? or mean like ? or example like ?
			  or Japanese like ?');
$sql->execute(array(
'%'.$_REQUEST['keyword'].'%',
'%'.$_REQUEST['keyword'].'%',
'%'.$_REQUEST['keyword'].'%',
'%'.$_REQUEST['keyword'].'%'
));
foreach ($sql as $row) {
	echo '<tr>';
	echo '<td>', $row['word'], '</td>';
	echo '<td>', $row['mean'], '</td>';
	echo '<td>', $row['example'], '</td>';
      echo '<td>', $row['Japanese'], '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
