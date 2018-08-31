<?php
	$error = "";

	if($_POST){
		$mail = $_POST["email"];
		$password = $_POST{"password"};

		try{
			$pdo = new PDO('mysql:host=localhost;dbname=store;charset=utf8','root','');
			// 例外を投げるモードに
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// プリペアドステートメントの処理方法の設定
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);


			// プリペアドステートメント使う
			$stmt =
			$pdo -> prepare('SELECT * FROM user WHERE mail = ? and password = ?');
			$stmt -> bindValue(1,$mail,PDO::PARAM_STR);
			$stmt -> bindValue(2,$password,PDO::PARAM_STR);

			$stmt -> execute();

			// もし検索結果が１行だったら
			if($stmt -> rowCount()==1){
				// ログイン情報をセッション変数に入れておく
				session_start();
				session_regenerate_id(true);
				$_SESSION["mail"]=$mail;
				header("Location:mypage.php");
				exit;
			}else{
				$error="IDまたはpasswordが違います";
			}

			// 接続切断
			$pdo = null;


		}catch(PDOException $error){
			exit("DB接続できません。".$error->getmessage());

		}


	}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php echo $error; ?>
	<h1>Login</h1>
	<form action="login.php" method="POST">
		<table>
		<tr>
			<td>email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2" class="td-bottom"><input type="submit" value="login"></td>
		</tr>
		</table>
	</form>
</body>
</html>
