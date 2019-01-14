<?php
require './setting.php';
require './model/todo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = 'dbuser';
    $pass = 'password';
    $dbh = new PDO('mysql:host=localhost;dbname=todo_db', $user, $pass);

    $title = $_POST['title'];
    $contents = $_POST['contents'];

    $sth = $dbh->prepare('insert into todos (title, contents) values (:title, :contents)');
    $sth->bindParam(':title', $title, PDO::PARAM_STR);
    $sth->bindParam(':contents', $contents, PDO::PARAM_STR);

    $result = $sth->execute();
    if ($result === false) {
        echo 'insert error';
        var_dump($sth->errorInfo());
        exit;
    }
    header('Location: /');
    exit;
} else {
    $todo = new Todo();
    $todo->id = null;
    $todo->title = '';
    $todo->contents = '';
}

?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>phpstudy</title>
    <style>
      .title {
        width: 10rem;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <a href="/">Home</a>
      <h1>Add</h1>
      <form action="add.php" method="post" class="form-group">
        <div class="form-group">
          <label>タイトル</label>
          <input type="text" name="title" class="form-control" value="<?= $todo->title; ?>">
        </div>
        <div class="form-group">
          <label>内容</label>
          <textarea class="form-control" rows="10" name="contents"><?= $todo->contents; ?></textarea>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="新規追加">
        </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>