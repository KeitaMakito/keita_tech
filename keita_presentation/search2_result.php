
<?php

$errorMessage1 = "";
$errorMessage2 = "";

if($_POST){
	//テキストボックスに入ってきたキーワードで
	//検索するSQL
// プリペアドステートメント使う

// goodsテーブルからnameが入力された名前のものを表示する
try{
	$pdo = new PDO('mysql:host=localhost;dbname=keita_presentation;charset=utf8','root','');
	// 例外を投げるモードに
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// プリペアドステートメントの処理方法の設定
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

	if( empty($_POST["keywords2"]) ){
		$errorMessage1 = "入力してください。";
		echo "<p>"; echo $errorMessage1; echo "</p>";
	}else{

		$stmt =
		$pdo -> prepare('SELECT * FROM food WHERE keywords2 like BINARY ?');

		$stmt2 =
		$pdo -> prepare('SELECT * FROM recipe WHERE zairyou like BINARY ?');

		$keywords2 = "%".$_POST["keywords2"]."%";

		// プレースホルダに値を設定
		$stmt -> bindValue(1,$keywords2,PDO::PARAM_STR);
		// PARAM_STRが、上の？に入る。

		// プレースホルダに値を設定
		$stmt2 -> bindValue(1,$keywords2,PDO::PARAM_STR);
		// PARAM_STRが、上の？に入る。


	//	上の「$stmt -> bindValue(1,$price,PDO::PARAM_STR);」の１とか２とか
	//  っていう数字は何番目の？かを表す。


		// 実行
		$stmt->execute();

		// 実行
		$stmt2->execute();


		// データベースと照らし合わせてチェック
		if( $stmt->rowCount() <= 0 && $stmt2->rowCount() <= 0 ) {
			$errorMessage2 = "該当するデータが見つかりませんでした。";
			echo "<p>"; echo $errorMessage2; echo "</p>";
		}else{

		// 実行結果を連想配列にして取得
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

?>

<form action="use_redirect.php" method="post">
<table>
	<tr>
		<th>品名</th>
		<th>購入年月日</th>
		<th>消費期限</th>
		<th>食べる/使う</th>
	</tr>

<tr>
<th><?php echo htmlspecialchars($row["name_of_product"],ENT_QUOTES,"utf-8"); ?></th>
<th><?php

$year_month_and_day_of_purchase = htmlspecialchars($row["year_month_and_day_of_purchase"],ENT_QUOTES,"utf-8");
$substr_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 0, 4);
$substr2_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 4, 2);
$substr3_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 6, 2);

echo $substr_year_month_and_day_of_purchase."年".$substr2_year_month_and_day_of_purchase."月".$substr3_year_month_and_day_of_purchase."日";

?></th>
<th><?php

$expiration_date = htmlspecialchars($row["expiration_date"],ENT_QUOTES,"utf-8");
$substr_expiration_date = substr($expiration_date, 0, 4);
$substr2_expiration_date = substr($expiration_date, 4, 2);
$substr3_expiration_date = substr($expiration_date, 6, 2);

echo $substr_expiration_date."年".$substr2_expiration_date."月".$substr3_expiration_date."日";

?></th>
<th><input type="checkbox" name="use_id_list[]" value="<?php echo $row{"id"}; ?>"></th>
</tr>
<tr>
<th colspan="4">
			<input type="submit" value="これを使う">
</th>
</tr>

</table>
</form>

<?php
			} // これは、消費期限などを１つずつ配列に格納する閉じ

/* ここまでは、今の段階で冷蔵庫にあって、食べられる料理を表示。
   ここから先は、それで作れる料理を表示。 */

?>

<h1><?php echo $_POST["keywords2"]; ?>を使った料理は、以下の通りです。</h1>

<?php

// 実行結果を連想配列にして取得
while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){

	?>

<form action="use_redirect.php" method="post" id="form01">
	<table>
			<h2><?php echo htmlspecialchars($row["name_of_ryouri"],ENT_QUOTES,"utf-8"); ?><a href='./tsukurikata.php?id=<?php echo $row{"id"}; ?>' target="_blank">（調理時間：<?php echo htmlspecialchars($row["time_of_cooking"],ENT_QUOTES,"utf-8"); ?>）</a></h2>
		<tr>
			<th>材料</th>
			<th>使う</th>
			<th>買い物リストに入れる</th>
			<th>今、冷蔵庫に</th>
		</tr>
			<?php
// undefined index name_of_ryouri と出たら、vardump($row); で何が入ってるのかを確かめる。
// var_dump($row);

			$zairyou_hyouji = htmlspecialchars($row["zairyou"],ENT_QUOTES,"utf-8");

			$pieces = explode(",", $zairyou_hyouji);
// var_dump($pieces);
//			var_dump( mb_strstr($pieces, '（') );


			for($i=0;$i<count($pieces);$i++){
						echo "<tr>";
						echo "<th>";
						echo $pieces[$i];
						echo "</th>";
						echo "<th>";
						$stmt3 =
						$pdo -> prepare('SELECT * FROM food WHERE (name_of_product like BINARY ?)');

						$keywords = $pieces[$i];

						// プレースホルダに値を設定
						$stmt3 -> bindValue(1,$keywords,PDO::PARAM_STR);
						// PARAM_STRが、上の？に入る。

						// 実行
						$stmt3->execute();
								$row2 = $stmt3->fetch(PDO::FETCH_ASSOC);
						echo "<input type='checkbox' name='use_id_list[]' value='".$row2["id"]."' />";  /* これをなんとかして配列に入れたい */
						echo "</th>";

						$stmt4 =
						$pdo -> prepare('SELECT * FROM food WHERE (name_of_product like BINARY ?)');

						$keywords = $pieces[$i];

						// プレースホルダに値を設定
						$stmt4 -> bindValue(1,$keywords,PDO::PARAM_STR);
						// PARAM_STRが、上の？に入る。

						// 実行
						$stmt4->execute();


						echo "<th>";
						echo "<input type='checkbox' name='use_list[]' value='".$pieces[$i]."' />";  /* これをなんとかして配列に入れたい */
						echo "</th>";


						echo "<th>";

						if( $stmt4->rowCount() == 0 ){
							echo "ないよ";
						}else{
							echo "あるよ";
						}
						echo "</th>";
						echo "</tr>";
			}

			echo "<tr>";
		 echo "<th colspan=\"4\">";
		echo "<input type=\"submit\" value=\"次へ\">";
		 echo "</th>";
		 echo "</tr>";

} // これは、材料を１つずつ配列に格納する閉じ
			 ?>
	</table>



</form>

<script
  src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
  integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  crossorigin="anonymous"></script>
<script>
/*
// FormSubmit(k)と入れることで、kに上の１か２が入る。

function FormSubmit(k) {

	var count = 0;

	$('input[type="checkbox"]').each(function(i,checkbox){

		if($(this).prop('checked')) {
				count=1;
		}


	});


	if(count==0){
		$('#message').html('<p style="color:red;">チェックボックスにチェックを入れてください。</p>');
	}else{
			var target = document.getElementById("form01");

			$('#text').val(k);

			target.method = "post";
			target.submit();
		}

}
*/
</script>

	<?php


		} // これは、データが投げ込まれ、一致するものが見つかったときの閉じ
	} // これは、データが投げ込まれたときの閉じ


// 接続切断
$pdo = null;

}catch(PDOException $error){
exit("DB接続できません。".$error->getmessage());

}

}
?>
