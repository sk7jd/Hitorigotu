<?php
// definition
$err_msg = "";
$message= "";

//connect
//$conn ="'localhost','kyoka','201107'";
$link = mysqli_connect('localhost','kyoka','201107');

//tweet
if( $link !== false ){
    $db_selected = mysqli_select_db('mydb', $link);
    if( isset( $_POST['send']) === true){
        $tweet = trim($_POST['tweet']);
        if($tweet !== ''){
            $query = "INSERT INTO twitter.tweet VALUES (" . "'" . $tweet . "'" . ")";
            $res = mysqli_query($query);
            if( $res !== false ){
                $message = 'ひとりごつに成功しました';
            }else{
                $err_msg ='ひとりごつに失敗しました';
            }
        }else{
            $err_msg = 'ひとりごつを記入してください';
        }
    }

    $query = 'SELECT tweet FROM twitter';
    $res = mysqli_query($query);
    $data = array();
    for( $i = 0; $i < mysqli_num_rows($res) ; $i++){
        $row = mysqli_fetch_array($res, NULL, MYSQL_ASSOC);
        print($row['tweet'].'<br>');
    } 
}else{
    print('err');
}

$close_flag = mysqli_close($link);

?>

<html lang="ja">
    <head>
        <mata charset="UTF-8">
            <title>ひとりごつ</title>
            <link rel="stylesheet" href="hitorigotu.css" >
    </head>
    <body>
        <div class="a">
        <header class="header">
            <img class="logo" src="hitorigotu.PNG" alt="ロゴ">
            <h1>ひとりごつ</h1>
        </header>
        </a>
        
        <div class="b">
            <aside class="aside">  
                <h2>プロフィール</h2>
                <prof class="prof">
                <p><img class="icon" src="icon.jpeg" alt="アイコン"> sato</p>
                </prof>
                <tab class="tab">
                <p>お気に入り<br>
                ブックマーク</p>
                </tab>
            </aside>
            <main class="main">
            <h2>ひとりごつbox</h2>
            <div class="new">
                <p>新しいひとりごつを書く</p>
                <form action="" method="post">
                    <textarea name="tweet" rows="4" cols="40">
                    </textarea>
                    <input type="submit" name="send" value="送信">
                </form>
            </new>
            <div class="tl">
                <?php 
                if( $message !== "") echo '<p>' . $message . '</p>';
                if( $err_msg !== "") echo '<p>' . $err_msg . '</p>'; 
                foreach($data as $key => $val){
                    print($row['tweet'].'<br>');
                }
                for( $i = 0; $i < mysqli_num_rows($res) ; $i++){
                    $row = mysqli_fetch_array($res, NULL, MYSQL_ASSOC);
                    print($row['tweet'].'<br>');
                } 
                ?>
            </div>
            </main>
        </b>
    </body>
</html>