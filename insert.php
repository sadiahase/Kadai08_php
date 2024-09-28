<?php
ini_set('display_errors', 1);

//1. POSTデータ取得
$name      = $_POST["name"];
$email     = $_POST["email"];
$book_name = $_POST["book_name"];
$point     = $_POST["point"];
$comment   = $_POST["comment"];

//2. DB接続します(呼び出し元)
// function db_conn(){
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();

// //３．データ登録SQL作成
$sql = "INSERT INTO php_form_table(name,email,book_name,point,comment)VALUES(:name,:email,:book_name,:point,:comment)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':point', $point, PDO::PARAM_INT);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// //４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{

//5．index.phpへリダイレクト
 header("Location: select.php");
// redirect("index.php");
   exit();
}
?>