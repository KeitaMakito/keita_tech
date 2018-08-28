<?php


//空白エラーチェック
if( $_POST["name_of_ryouri"] == null || $_POST["zairyou"] == null || $_POST["time_of_cooking"] == null || $_POST["bunryou"] == null ) {
//リダイレクト(画面遷移)
header( "Location: ./recipe_new.php?errno=1" );
exit;
}



	//ここでデータを受け取る

	$id = $_POST["id"];
	$name_of_ryouri = $_POST["name_of_ryouri"];
	$zairyou = $_POST["zairyou"];
	$time_of_cooking = $_POST["time_of_cooking"];
	$bunryou = $_POST["bunryou"];
	$tsukurikata = $_POST["tsukurikata"];


	/* 商品名 */
	$mugai_name_of_ryouri = htmlspecialchars($_POST["name_of_ryouri"]);
	$tagjokyo_mugai_name_of_ryouri = strip_tags($mugai_name_of_ryouri);
	$name_of_ryouri = trim($tagjokyo_mugai_name_of_ryouri);

	/* 購入年月日 */
	$mugai_zairyou = htmlspecialchars($_POST["zairyou"]);
	$tagjokyo_mugai_zairyou = strip_tags($mugai_zairyou);
	$zairyou = trim($tagjokyo_mugai_zairyou);
	/* ここで全角で入力された場合、半角に変換する */
	$zairyou = mb_convert_kana($zairyou, 'n');
	$str1 = strlen($zairyou);

	/* 消費期限 */
	$mugai_time_of_cooking = htmlspecialchars($_POST["time_of_cooking"]);
	$tagjokyo_mugai_time_of_cooking = strip_tags($mugai_time_of_cooking);
	$time_of_cooking = trim($tagjokyo_mugai_time_of_cooking);
	/* ここで全角で入力された場合、半角に変換する */
	$time_of_cooking = mb_convert_kana($time_of_cooking, 'n');
	$str2 = strlen($time_of_cooking);

	/* bunryou */
	$mugai_bunryou = htmlspecialchars($_POST["bunryou"]);
	$tagjokyo_mugai_bunryou = strip_tags($mugai_bunryou);
	$bunryou = trim($tagjokyo_mugai_bunryou);

	/* tsukurikata */
	$mugai_tsukurikata = htmlspecialchars($_POST["tsukurikata"]);
	$tagjokyo_mugai_tsukurikata = strip_tags($mugai_tsukurikata);
	$tsukurikata = trim($tagjokyo_mugai_tsukurikata);



/**************************************
ここで空白入力チェック
*****************************************/

	//getparameterの取得
	if( ( $name_of_ryouri == null || $zairyou == null || $time_of_cooking == null || $bunryou == null || $tsukurikata == null ) ){
	//indexへリダイレクト(画面遷移)
	header( "Location: ./recipe_new.php" );
}else{
  session_start();
    //セッションにデータを格納する。
  $_SESSION["name_of_ryouri"] = $name_of_ryouri;
  $_SESSION["zairyou"] = $zairyou;
  $_SESSION["time_of_cooking"] = $time_of_cooking;
  $_SESSION["bunryou"] = $bunryou;
  $_SESSION["tsukurikata"] = $tsukurikata;

	header( "Location: ./recipe_add.php" );
    }

?>

  </body>
</html>
