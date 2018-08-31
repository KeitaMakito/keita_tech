<?php

//セッション開始
//※セッション利用時は必ず呼び出さす。
session_start();

//セッションからデータを受け取る。
$name_of_product = $_SESSION["name_of_product"];
$year_month_and_day_of_purchase = $_SESSION["year_month_and_day_of_purchase"];
$expiration_date = $_SESSION["expiration_date"];
$keywords = $_SESSION["keywords"];
$keywords2 = $_SESSION["keywords2"];







// usersテーブルを使う
try{
  $pdo = new PDO('mysql:host=localhost;dbname=keita_presentation;charset=utf8','root','');
  // 例外を投げるモードに
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // プリペアドステートメントの処理方法の設定
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);


  // プリペアドステートメント使う
  $stmt =
  $pdo -> prepare('INSERT INTO food (name_of_product, year_month_and_day_of_purchase, expiration_date, keywords, keywords2) VALUES (?, ?, ?, ?, ?)');



  // プレースホルダに値を設定
  $stmt -> bindValue(1,$name_of_product,PDO::PARAM_STR);
  $stmt -> bindValue(2,$year_month_and_day_of_purchase,PDO::PARAM_STR);
  $stmt -> bindValue(3,$expiration_date,PDO::PARAM_INT);
  $stmt -> bindValue(4,$keywords,PDO::PARAM_STR);
  $stmt -> bindValue(5,$keywords2,PDO::PARAM_STR);
  // PARAM_STRが、上の？に入る。

//	上の「$stmt -> bindValue(1,$price,PDO::PARAM_STR);」の１とか２とか
//  っていう数字は何番目の？かを表す。


  // 実行
  $stmt->execute();

  // 実行結果を連想配列にして取得
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo htmlspecialchars($row["name_of_product"],ENT_QUOTES,"utf-8");
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
