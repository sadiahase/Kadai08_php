    <?php
    // 1.DBへ接続
    
     try{
        $pdo = new PDO('mysql:dbname=php_form;charset=utf8;host=localhost','********','********'.';port=3306');
    } catch (PDOException $e) {
        exit('DB_CONECT:'.$e->getMessage());
      }
      
    // 2.データ登録SQL作成
    $sql = "SELECT * FROM php_form_table";
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    // 3.データ表示
    // $view=""; 無視する
    if($status==false){
    // execute(SQL実行時にエラーがある場合)
    $erroe = $stmt->   errorInfo(); 
    exit("SQL_ERROR:".$error[2]);
    }

    // 全データ取得
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<style>
div{padding: 10px;font-size:16px;}
td{border: 1px solid black;}
</style>
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
        <td><?=$value["name"]?></td>
        <td><?=$value["email"]?></td>
        <td><?=$value["book_name"]?></td>
        <td><?=$value["point"]?></td>
        <td><?=$value["comment"]?></td>
        </tr>
    <?php }?>
    </table>
    </div>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り



</script>
</body>
</html>