<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>形容詞検索結果</title>
<link rel="stylesheet" href="css/search.css">

</head>
<body>


<table>
<tr><th>単語</th><th>意味</th><th>～より</th><th>いちばん</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');
$sql=$pdo->prepare('select * FROM ajective_table where word like ? or mean like ? or er like ?
			  or est like ?');
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
	echo '<td>', $row['er'], '</td>';
      echo '<td>', $row['est'], '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
