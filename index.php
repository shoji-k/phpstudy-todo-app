<?php
require './setting.php';
require './model/todo.php';

$todos = [];

$todo = new Todo();
$todos[] = $todo;
$todos[] = $todo;

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
      <h1>Todo</h1>
      <div>
        <a href="/add.php" class="btn btn-link">追加</a>
      </div>
      <table class="table">
        <tr>
          <th class="title">タイトル</th>
          <th class="created">作成日時</th>
          <th class="action">操作</th>
        </tr>
        <?php foreach ($todos as $one): ?>
        <tr>
          <td>sample title</td>
          <td>2001/01/01 10:00:00</td>
          <td>
            <a href="/edit.php?id=999">編集</a>
            <a href="/view.php?id=999">表示</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>