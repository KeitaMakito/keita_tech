<?php

	//ここでデータを受け取る

	$id = $_POST["id"];
	$name_of_ryouri = $_POST["name_of_ryouri"];
	$zairyou = $_POST["zairyou"];
	$time_of_cooking = $_POST["time_of_cooking"];
	$bunryou = $_POST["bunryou"];
	$tsukurikata = $_POST["tsukurikata"];

	/* 料理名 */
	$mugai_name_of_ryouri = htmlspecialchars($_POST["name_of_ryouri"]);
	$tagjokyo_mugai_name_of_ryouri = strip_tags($mugai_name_of_ryouri);
	$name_of_ryouri = trim($tagjokyo_mugai_name_of_ryouri);

	/* 材料 */
	$mugai_zairyou = htmlspecialchars($_POST["zairyou"]);
	$tagjokyo_mugai_zairyou = strip_tags($mugai_zairyou);
	$zairyou = trim($tagjokyo_mugai_zairyou);

	/* 調理時間 */
	$mugai_time_of_cooking = htmlspecialchars($_POST["time_of_cooking"]);
	$tagjokyo_mugai_time_of_cooking = strip_tags($mugai_time_of_cooking);
	$time_of_cooking = trim($tagjokyo_mugai_time_of_cooking);

	/* 分量 */
	$mugai_bunryou = htmlspecialchars($_POST["bunryou"]);
	$tagjokyo_mugai_bunryou = strip_tags($mugai_bunryou);
	$bunryou = trim($tagjokyo_mugai_bunryou);

	/* 作り方 */
	$mugai_tsukurikata = htmlspecialchars($_POST["tsukurikata"]);
	$tagjokyo_mugai_tsukurikata = strip_tags($mugai_tsukurikata);
	$tsukurikata = trim($tagjokyo_mugai_tsukurikata);

/**************************************
ここで空白入力チェック
*****************************************/

	//getparameterの取得
	if( ( $name_of_ryouri == null || $zairyou == null || $time_of_cooking == null || $bunryou == null || $tsukurikata == null ) ){
	//indexへリダイレクト(画面遷移)
	header( "Location: ./recipe_edit.php?id=".$_POST["id"] );
}else{

	// ここで更新処理
			if($_POST){
				//DB接続

				$mysqli = new mysqli("localhost","root","","keita_presentation");

				if($mysqli->connect_error){
					echo "DB接続できません。";
				}
				else{
					//文字コード設定
					$mysqli->set_charset("utf8");
				}

				//更新するSQL
				$sql2 = "UPDATE recipe SET name_of_ryouri='".$name_of_ryouri."', zairyou='".$zairyou."', time_of_cooking='".$time_of_cooking."', bunryou='".$bunryou."', tsukurikata='".$tsukurikata."' WHERE id ='".$id."'";
				$result = $mysqli -> query($sql2);
				header("Location: ./recipe_ichiran.php"); //Locationの直後はスペースを入れずに:を書く。
				exit; //ここのexitが大事！これがなきゃ下まで全部動いてしまう。
			}


	header( "Location: ./recipe_edit.php" );
}
