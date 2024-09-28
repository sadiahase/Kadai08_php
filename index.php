<!-- データ入力 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>おすすめしたい本データ登録</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend class="form_title">おすすめしたい本</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>Email：<input type="text" name="email"></label><br>
     <label>読んだ本の名前：<input type="text" name="book_name"></label><br>
     <label>おすすめ度：<input type="text" name="point"></label><br>
     <label>一言コメント：<textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

<!-- ↓サイトなどから引っ張ってきた内容 -->

<!-- ↓入力内容を確認画面から戻った際にも表示させておく処理 -->
<?php
  session_start();
  $mode = "input";
  if( isset($_POST["back"] ) && $_POST["back"] ){
    // 何もしない
  } else if( isset($_POST["confirm"] ) && $_POST["confirm"] ){
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["book_name"] = $_POST["book_name"];
    $_SESSION["point"] = $_POST["point"];
    $_SESSION["comment"] = $_POST["comment"];
    $mode = "confirm";
  } else if( isset($_POST["send"] ) && $_POST["send"] ){
    $mode = "send";
  } else {
    $SESSION = array();
  }
?>


<!-- Main[End] -->


</body>
</html>
<!-- やりたいこと：①入力画面、②確認画面の作成、③送信処理・送信完了画面（通知？）、④送信した内容が一覧として表示される -->