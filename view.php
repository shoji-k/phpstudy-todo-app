<?php
require '../setting.php';
require './model/todo.php';

try {
    $user = 'dbuser';
    $pass = 'password';
    $dbh = new PDO('mysql:host=localhost;dbname=todo_db', $user, $pass);

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $contents = $_POST['contents'];

        $sth = $dbh->prepare('delete from todos where id = :id');
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();
        if ($result === false) {
            echo 'delete error';
            exit;
        }

        header('Location: /');
        exit();

    } else {
        $sth = $dbh->prepare('SELECT id, title, contents, created, modified from todos where id = :id');
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $rows = $sth->fetchAll();
        $row = current($rows);
        
        $todo = new Todo();
        $todo->id = $row['id'];
        $todo->title = $row['title'];
        $todo->contents = $row['contents'];
    }
} catch (PDOException $e) {
    echo "エラー!: " . $e->getMessage() . "<br/>";
    exit();
}
?>

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>phpstudy</title>
</head>
  <body>
    <div class="container">
        <a href="/">Home</a>
        <h1>Edit</h1>
        <form action="view.php?id=<?= $id; ?>" method="post" class="form-group">
            <div class="form-group">
                <label>タイトル</label>
                <p><?= $todo->title; ?></p>
            </div>
            <div class="form-group">
                <label>内容</label>
                <p><?= $todo->contents; ?></p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="削除">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

