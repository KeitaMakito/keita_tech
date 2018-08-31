<?php
//DB接続

$mysqli = new mysqli("localhost","root","","keita_presentation");

if($mysqli->connect_error){
	echo "DB接続できません。";
}
else{
	//文字コード設定
	$mysqli->set_charset("utf8");
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>食品リスト編集｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

	<form action="edit_redirect.php" method="post">

<?php


if($_GET){
	// テキストボックスに入ってた言葉で検索
	$sql = "SELECT * FROM food WHERE id =".$_GET["id"];
}
// 上のＳＱＬ文を実行
$result = $mysqli -> query($sql);

if($result){
	// 実行結果を連想配列で取得
	while($row = $result->fetch_assoc()){


		echo "<table>";

		echo "<tr>";
		echo "<th>品名</th>";
		echo "<th><input type=\"hidden\" name=\"id\" value=".$row{"id"}."><input type=\"text\" name=\"name_of_product\" value=".$row{"name_of_product"}."></th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>購入年月日</th>";
		echo "<th><input type=\"text\" name=\"year_month_and_day_of_purchase\" value=".$row{"year_month_and_day_of_purchase"}."></th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>消費期限</th>";
		echo "<th><input type=\"text\" name=\"expiration_date\" value=".$row{"expiration_date"}."></th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>商品の説明</th>";
		echo "<th><input type=\"text\" name=\"keywords\" value=".$row{"keywords"}."></th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>材料</th>";
		echo "<th><input type=\"text\" name=\"keywords2\" value=".$row{"keywords2"}."></th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>これは操作か？ああ、そうさ。</th>";
		echo "<th><input type=\"submit\" value=\"更新\" /></th>";
		echo "</tr>";
		echo "</table>";
	}

}



?>

</form>

<p>空白は入れないでください。</p>
<p>購入年月日・消費期限は、８桁で入力してください。</p>
<p>例)　　2016年8月15日 → 20160815</p>

</div>

<?php
require("./footer.html");
?>


</body>
</html>
