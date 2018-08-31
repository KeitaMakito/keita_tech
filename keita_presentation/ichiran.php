<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>食品一覧｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

	<table>
		<tr>
			<th>品名</th>
			<th>購入年月日</th>
			<th>消費期限</th>
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
	$pdo -> prepare('SELECT * FROM food');




	// 実行
	$stmt->execute();

	// 実行結果を連想配列にして取得
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo "<th>".htmlspecialchars($row["name_of_product"],ENT_QUOTES,"utf-8")."</th>";

		$year_month_and_day_of_purchase = htmlspecialchars($row["year_month_and_day_of_purchase"],ENT_QUOTES,"utf-8");
		$substr_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 0, 4);
		$substr2_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 4, 2);
		$substr3_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 6, 2);

		echo "<th>".$substr_year_month_and_day_of_purchase."年".$substr2_year_month_and_day_of_purchase."月".$substr3_year_month_and_day_of_purchase."日</th>";

		$expiration_date = htmlspecialchars($row["expiration_date"],ENT_QUOTES,"utf-8");
		$substr_expiration_date = substr($expiration_date, 0, 4);
		$substr2_expiration_date = substr($expiration_date, 4, 2);
		$substr3_expiration_date = substr($expiration_date, 6, 2);

		echo "<th>".$substr_expiration_date."年".$substr2_expiration_date."月".$substr3_expiration_date."日</th>";

		echo "<th><a href='edit.php?id=".$row{"id"}."'><button type='submit'>編集</button></a></th>";
		echo "<th><a href='delete.php?id=".$row{"id"}."'><button type='submit'>削除</button></a></th>";
		echo "</tr>";
	}



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
