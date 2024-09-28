<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
include("funcs.php");
$pdo = db_conn();
// try {
//   $db_name = "php_form";     //データベース名
//   $db_id   = "root";      //アカウント名
//   $db_pw   = "";          //パスワード：XAMPPはパスワード無しに修正してください。
//   $db_host = "localhost"; //DBホスト
//   $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//   exit('DB Connection Error:'.$e->getMessage());
// }

//２．データ登録SQL作成
$sql = "SELECT * FROM php_form_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
// $values = "";
if($status==false) {
    sql_error($stmt);
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>おすすめしたい本</title>
<link rel="stylesheet" href="form.css">
<link href="form.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">

      <table>
      <?php foreach($values as $value){ ?>
        <tr>
          <td><?=h($v["name"])?></td>
          <td><?=h($v["email"])?></td>
          <td><?=h($v["book_name"])?></td>
          <td><?=h($v["point"])?></td>
          <td><?=h($v["comment"])?></td>
          <td><a href="detail.php?id=<?=h($v["id"])?>">[更新]</a></td>
          <td><a href="delete.php?id=<?=h($v["id"])?>">[削除]</a></td>
        </tr>
      <?php } ?>
      </table>

  </div>
</div>
<!-- Main[End] -->

<script>
  $a = '<?=$json;?>';
  const obj = JSON.parse($a);
  console.log(obj);
</script>
</body>
</html>
