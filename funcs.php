<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn(){
    try {
      $db_name = "********"; //データベース名
      $db_id = "********"; //さくらサーバーに登録している管理者アカウント名
      $db_pw ="********"; //さくらサーバの管理者パスワード
      $db_host = "********"; //コントロールパネルに表記のあるDBホスト
      $server_info = 'mysql:dbname='.$db_name.';charset=utf8;host='.$db_host.';port=3306';
      return new PDO($server_info, $db_id, $db_pw);
      // return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw.';port=3306');
    } catch (PDOException $e) {
      exit('DB_CONECT:'.$e->getMessage());
    }
    }

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);
  }

//リダイレクト関数: redirect($file_name) どこに戻すか
function redirect($file_name){
  header("Location: ".$file_name);
  exit();
  }
?>
