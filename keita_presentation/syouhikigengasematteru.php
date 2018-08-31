

<h1>消費期限が迫っています。</h1>
	<table>
		<tr>
			<th>品名</th>
			<th>購入年月日</th>
			<th>消費期限</th>
			<th colspan="2">これは操作か？ああ、そうさ。</th>
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
	$pdo -> prepare('SELECT * FROM food where expiration_date < ?');

	// 1週間後 の日付を取得する
		$issyuukango = date('Ymd', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));
		$issyuukango = date('Ymd', strtotime('+1 week'));

		// プレースホルダに値を設定
		$stmt -> bindValue(1,$issyuukango,PDO::PARAM_STR);
		// PARAM_STRが、上の？に入る。


	// 実行
	$stmt->execute();


$a = array();

	// 実行結果を連想配列にして取得
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		echo "<th>".htmlspecialchars($row["name_of_product"],ENT_QUOTES,"utf-8")."</th>";
$a[] = $row["name_of_product"];

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

		echo "<th><a href='edit.php?id=".$row{"id"}."'>編集</a></th>";
		echo "<th><a href='delete.php?id=".$row{"id"}."'>削除</a></th>";
		echo "</tr>";
	}

// echo $a[0];

?>
</table>

<h1>このような料理が作れます。</h1>


<?php
/*******************************************************************************************************************/
/*****************************　　ここで、足りないものを使った料理を出す　　*********************************************/
/*******************************************************************************************************************/

$errorMessage2 = "";


// goodsテーブルからnameが入力された名前のものを表示する

	$pdo = new PDO('mysql:host=localhost;dbname=keita_presentation;charset=utf8','root','');
	// 例外を投げるモードに
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// プリペアドステートメントの処理方法の設定
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

// ここで複数の迫ってる材料を使った料理を出す

	$jouken = "";

for($i=0; $i<count($a); $i++){
	if($i == count($a)-1){
		$jouken .= " zairyou like ?";
	}else{
		$jouken .= " zairyou like ? or ";
	}
}

// echo "SELECT * FROM recipe WHERE".$jouken;

		$stmt2 =
		$pdo -> prepare('SELECT * FROM recipe WHERE '.$jouken);

		for($i=0; $i<count($a); $i++){
			$sematterusyokuhin = "%".$a[$i]."%";
			// bindValueの$1[この中身]で困ってる
			$stmt2 -> bindValue($i+1,$sematterusyokuhin,PDO::PARAM_STR);
		}

		// プレースホルダに値を設定
//		$stmt2 -> bindValue(1,$sematterusyokuhin,PDO::PARAM_STR);
//		$stmt2 -> bindValue(2,$sematterusyokuhin2,PDO::PARAM_STR);
		// PARAM_STRが、上の？に入る。

	//	上の「$stmt2 -> bindValue(1,$price,PDO::PARAM_STR);」の１とか２とか
	//  っていう数字は何番目の？かを表す。


		// 実行
		$stmt2->execute();

		// データベースと照らし合わせてチェック
		if( $stmt2->rowCount() <= 0  ) {
			$errorMessage2 = "該当するデータが見つかりませんでした。";
			echo "<p>"; echo $errorMessage2; echo "</p>";
		}else{

?>


<?php
	// 実行結果を連想配列にして取得
	while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
?>

<form action="use_redirect.php" method="post" id="form01">

<table>
	<tr>
	<th rowspan="2">確認</th>
		<th>品名</th>
		<th colspan="3"><?php echo htmlspecialchars($row["name_of_ryouri"],ENT_QUOTES,"utf-8"); ?></th>
	</tr>



<tr>
	<th>材料</th>
	<th>購入年月日</th>
	<th>消費期限</th>
	<th>冷蔵庫に</th>
</tr>
	<?php


	$zairyou_hyouji = htmlspecialchars($row["zairyou"],ENT_QUOTES,"utf-8");

	$pieces = explode(",", $zairyou_hyouji);


//			var_dump( mb_strstr($pieces, '（') );


	for($i=0;$i<count($pieces);$i++){

		$stmt22 =
		$pdo -> prepare('SELECT * FROM food WHERE (name_of_product like BINARY ?)');

		$keywords = $pieces[$i];

		// プレースホルダに値を設定
		$stmt22 -> bindValue(1,$keywords,PDO::PARAM_STR);
		// PARAM_STRが、上の？に入る。

		// 実行
		$stmt22->execute();

		// 実行結果を連想配列にして取得
		$row2 = $stmt22->fetch(PDO::FETCH_ASSOC);


				echo "<tr>";
				echo "<th>";
				echo "<input type='checkbox' name='use_list[]' value='".$row2["id"]."' />";  /* これをなんとかして配列に入れたい */
				echo "</th>";
				echo "<th>";
				echo $pieces[$i];
				echo "</th>";



					echo "<th>";
					if( $stmt22->rowCount() != 0 ){
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
					if( $stmt22->rowCount() != 0 ){
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
				if( $stmt22->rowCount() == 0 ){
					echo "ないよ";
				}else{
					echo "あるよ";
				}
				echo "</th>";
				echo "</tr>";

}
	 ?>
	 <tr>
	 <th colspan="5">
	 			<input type="button" onclick="FormSubmit();" value="使う">
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
function FormSubmit() {

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
		target.method = "post";
		target.submit();
	}



}
</script>
<?php

		}



/*******************************************************************************************************************/
/*****************************　　ここで、足りないものを使った料理を出す　　*********************************************/
/*******************************************************************************************************************/
?>







<?php
// 接続切断
$pdo = null;

}catch(PDOException $error){
	exit("DB接続できません。".$error->getmessage());
}

?>
