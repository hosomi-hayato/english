<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>動詞検索結果</title>
<link rel="stylesheet" href="css/search.css">

</head>
<body>


<table>
<tr><th>単語</th><th>～する</th><th>～した</th><th>～られる</th><th>～している</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');
$sql=$pdo->prepare('select * FROM verb_table where word like ? or mean like ? or past like ?
			  or participle like ? or ing like ?' );

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
	echo '<td>', $row['past'], '</td>';
      echo '<td>', $row['participle'], '</td>';
      echo '<td>', $row['ing'], '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
