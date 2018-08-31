<?php

//セッション開始
//※セッション利用時は必ず呼び出さす。
session_start();

//セッションからデータを受け取る。
$name_of_ryouri = $_SESSION["name_of_ryouri"];
$zairyou = $_SESSION["zairyou"];
$time_of_cooking = $_SESSION["time_of_cooking"];
$bunryou = $_SESSION["bunryou"];
$tsukurikata = $_SESSION["tsukurikata"];







// usersテーブルを使う
try{
  $pdo = new PDO('mysql:host=localhost;dbname=keita_presentation;charset=utf8','root','');
  // 例外を投げるモードに
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // プリペアドステートメントの処理方法の設定
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);


  // プリペアドステートメント使う
  $stmt =
  $pdo -> prepare('INSERT INTO recipe (name_of_ryouri, zairyou, time_of_cooking, bunryou, tsukurikata) VALUES (?, ?, ?, ?, ?)');



  // プレースホルダに値を設定
  $stmt -> bindValue(1,$name_of_ryouri,PDO::PARAM_STR);
  $stmt -> bindValue(2,$zairyou,PDO::PARAM_STR);
  $stmt -> bindValue(3,$time_of_cooking,PDO::PARAM_INT);
  $stmt -> bindValue(4,$bunryou,PDO::PARAM_STR);
  $stmt -> bindValue(5,$tsukurikata,PDO::PARAM_STR);
  // PARAM_STRが、上の？に入る。

//	上の「$stmt -> bindValue(1,$price,PDO::PARAM_STR);」の１とか２とか
//  っていう数字は何番目の？かを表す。


  // 実行
  $stmt->execute();

  // 実行結果を連想配列にして取得
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo htmlspecialchars($row["name_of_ryouri"],ENT_QUOTES,"utf-8");
  }



// 接続切断
$pdo = null;
header( "Location: ./ichiran.php" );

  }catch(PDOException $error){
    exit("DB接続できません。".$error->getmessage());

  }


?>

  </body>
</html>
