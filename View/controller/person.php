<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>人検索結果</title>
<link rel="stylesheet" href="css/search.css">

</head>
<body>
<table>
<tr><th>単語</th><th>～は</th><th>～の</th><th>～に</th><th>～のもの</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8', 
	'staff', 'password');
$sql=$pdo->prepare('select * FROM person_table where word like ? or mean like ? or word2 like ?
			  or word3 like ? or word4 like ?' );

$sql->execute(array(
'%'.$_REQUEST['keyword'].'%',
'%'.$_REQUEST['keyword'].'%',
'%'.$_REQUEST['keyword'].'%',
'%'.$_REQUEST['keyword'].'%',
'%'.$_REQUEST['keyword'].'%'
)
);
foreach ($sql as $row) {
	echo '<tr>';
	echo '<td>', $row['word'], '</td>';
	echo '<td>', $row['mean'], '</td>';
	echo '<td>', $row['word2'], '</td>';
      echo '<td>', $row['word3'], '</td>';
      echo '<td>', $row['word4'], '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>