<?php


// idを受け取る
$use_id_list=array();
// ↑で配列を初期化
if( isset( $_POST["use_id_list"] ) ){
  //設定されている
  $use_id_list = $_POST["use_id_list"];
// var_dump($use_id_list);
// echo "<br>";


    //DB接続
    $mysqli = new mysqli("localhost","root","","keita_presentation");
//    echo "test";

    if($mysqli->connect_error){
    	echo "DB接続できません。";
    }
    else{
    	//文字コード設定
    	$mysqli->set_charset("utf8");
//    echo "接続できました";
// echo $test[$i];
    }


    for ($i = 0; $i < count($_POST["use_id_list"]); $i++){
      $test[$i] = $_POST["use_id_list"][$i];
  //    echo $test[$i];
  // $test[$i]は商品名である。
  // なので、ここからidを探さなきゃいけない。

		//更新するSQL

//      $test2[$i] = $_POST["use_id_list"][$i];
//      $sql2 = "DELETE from food WHERE id ='".$test2[$j]."'";
// echo      $sql2 = "SELECT * from food WHERE id ='".$test2[$i]."'";
echo      $sql2 = "delete from food WHERE id ='".$test[$i]."'";
  } // これは、idを取得したときの処理のfor文の閉じ
      $result = $mysqli -> query($sql2);

} // idを受け取った閉じ



  //データが引き渡されているかの確認
  $use_list=array();
  // ↑で配列を初期化
  if( isset( $_POST["use_list"] ) ){
    //設定されている
    $use_list = $_POST["use_list"];
//  var_dump($use_list);
//  echo "<br>";



  for ($i = 0; $i < count($_POST["use_list"]); $i++){
    $test2[$i] = $_POST["use_list"][$i];

  //ファイル読み込み
  $file_data = file_get_contents("kaimonolist.txt");
  // ここで追記できる
  file_put_contents("kaimonolist.txt", $file_data . $test2[$i] . PHP_EOL);

// var_dump($_POST["use_id_list"]);
} // これはuse_listのfor文の閉じ

  } // 食品名を受け取った閉じ






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

	<p>更新しました。</p>

	<p><a href = "./ichiran.php"><img src="./img/to_ichiran.gif"></a></p>

</div>

</body>
</html>
