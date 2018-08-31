
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

	if( empty($_POST["keywords"]) ){
		$errorMessage1 = "入力してください。";
		echo "<p>"; echo $errorMessage1; echo "</p>";
	}else{

		$stmt =
		$pdo -> prepare('SELECT * FROM recipe WHERE (name_of_ryouri like BINARY ?)');

		$keywords = "%".$_POST["keywords"]."%";

		// プレースホルダに値を設定
		$stmt -> bindValue(1,$keywords,PDO::PARAM_STR);
		// PARAM_STRが、上の？に入る。

	//	上の「$stmt -> bindValue(1,$price,PDO::PARAM_STR);」の１とか２とか
	//  っていう数字は何番目の？かを表す。


		// 実行
		$stmt->execute();

		// データベースと照らし合わせてチェック
		if( $stmt->rowCount() <= 0  ) {
			$errorMessage2 = "該当するデータが見つかりませんでした。";
			echo "<p>"; echo $errorMessage2; echo "</p>";
		}else{

?>


<?php
	// 実行結果を連想配列にして取得
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

<form action="use_redirect.php" method="post" id="form01">


	<h2 colspan="3"><?php echo htmlspecialchars($row["name_of_ryouri"],ENT_QUOTES,"utf-8"); ?><a href='./tsukurikata.php?id=<?php echo $row{"id"}; ?>' target="_blank">（調理時間：<?php echo htmlspecialchars($row["time_of_cooking"],ENT_QUOTES,"utf-8"); ?>）</a></h2>


<table>
	<tr>
	<th>材料</th>
	<th>使う</th>
	<th>買い物リストに入れる</th>
	<th>購入年月日</th>
	<th>消費期限</th>
	<th>冷蔵庫に</th>
</tr>
	<?php


	$zairyou_hyouji = htmlspecialchars($row["zairyou"],ENT_QUOTES,"utf-8");

	$pieces = explode(",", $zairyou_hyouji);

//			var_dump( mb_strstr($pieces, '（') );


	for($i=0;$i<count($pieces);$i++){

		$stmt2 =
		$pdo -> prepare('SELECT * FROM food WHERE (name_of_product like BINARY ?)');

		$keywords = $pieces[$i];

		// プレースホルダに値を設定
		$stmt2 -> bindValue(1,$keywords,PDO::PARAM_STR);
		// PARAM_STRが、上の？に入る。

		// 実行
		$stmt2->execute();

		// 実行結果を連想配列にして取得
		$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

				echo "<tr>";
				echo "<th>";
				echo $pieces[$i];
				echo "</th>";
				echo "<th>";
				echo "<input type='checkbox' name='use_id_list[]' value='".$row2["id"]."' />";
				echo "</th>";
				echo "<th>";
				echo "<input type='checkbox' name='use_list[]' value='".$pieces[$i]."' />";  /* これをなんとかして配列に入れたい */
				echo "</th>";

					echo "<th>";
					if( $stmt2->rowCount() != 0 ){
						$year_month_and_day_of_purchase = htmlspecialchars($row2["year_month_and_day_of_purchase"],ENT_QUOTES,"utf-8");
						$substr_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 0, 4);
						$substr2_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 4, 2);
						$substr3_year_month_and_day_of_purchase = substr($year_month_and_day_of_purchase, 6, 2);

						echo $substr_year_month_and_day_of_purchase."年".$substr2_year_month_and_day_of_purchase."月".$substr3_year_month_and_day_of_purchase."日";
					}else{
						echo "-";
					}
					echo "</th>";

					echo "<th>";
					if( $stmt2->rowCount() != 0 ){
						$expiration_date = htmlspecialchars($row2["expiration_date"],ENT_QUOTES,"utf-8");
						$substr_expiration_date = substr($expiration_date, 0, 4);
						$substr2_expiration_date = substr($expiration_date, 4, 2);
						$substr3_expiration_date = substr($expiration_date, 6, 2);

						echo $substr_expiration_date."年".$substr2_expiration_date."月".$substr3_expiration_date."日";
					}else{
						echo "-";
					}
					echo "</th>";



				echo "<th>";
				if( $stmt2->rowCount() == 0 ){
					echo "ないよ";
				}else{
					echo "あるよ";
				}
				echo "</th>";
				echo "</tr>";

}
	 ?>
	 <tr>
	 <th colspan="6">
	 			<input type="submit" value="次へ">
	 <!--			<input type="button" onclick="FormSubmit(1);" value="使う"> -->
	 <!--				<input type="hidden" name="btn_no" id="text"> -->
	 <!--			<input type="button" onclick="FormSubmit(2);" value="買い物リストに入れる"> -->
	 </th>
	 </tr>
</table>
<?php
			}
?>

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

		}
	}


// 接続切断
$pdo = null;

}catch(PDOException $error){
exit("DB接続できません。".$error->getmessage());

}

}
?>
