<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>レシピ一覧｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

	<table>
		<tr>
			<th>料理名</th>
			<th colspan="2">操作選択</th>
		</tr>
<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=keita_presentation;charset=utf8','root','');
	// 例外を投げるモードに
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// プリペアドステートメントの処理方法の設定
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);


	// プリペアドステートメント使う
	$stmt =
	$pdo -> prepare('SELECT * FROM recipe');




	// 実行
	$stmt->execute();

	// 実行結果を連想配列にして取得
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo "<th><a href='./tsukurikata.php?id=".$row{"id"}."' target='_blank'>".htmlspecialchars($row["name_of_ryouri"],ENT_QUOTES,"utf-8")."</a></th>";

		echo "<th><a href='recipe_edit.php?id=".$row{"id"}."'><button type='submit'>編集</button></a></th>";
		echo "<th><a href='recipe_delete.php?id=".$row{"id"}."'><button type='submit'>削除</button></a></th>";
		echo "</tr>";
	}

		echo "<tr><th colspan='3'><a href='./recipe_new.php'>レシピを追加する</a></th></tr>";

// 接続切断
$pdo = null;


}catch(PDOException $error){
	exit("DB接続できません。".$error->getmessage());

}

?>
</table>

</div>

<?php
require("./footer.html");
?>

</body>
</html>
