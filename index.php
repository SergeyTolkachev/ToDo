<?php
require_once 'migrate.php';
$connect = new mysqli('127.0.0.1', 'root', 'root', 'todo' );
if($_GET['id']){
    $id = $_GET['id'];
    $connect->query("delete from `list` where id = '$id'");
    header('Location: http://todo.com');
}
if ($_POST && $_POST['text'] != null){
    $text=htmlspecialchars($_POST['text']);
    $connect->query("insert into `list` set text = '$text'");
    $query = $connect->query('SELECT * FROM `list`');
    $result = $query->fetch_all() ;}
else {
    $query = $connect->query('SELECT * FROM `list`');
    $result = $query->fetch_all() ;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>TODO list</title>
</head>
<body style="background-color: black; color: lightblue; text-align: center; word-break: break-all ">
    <div class="container" >
        <br><br><br><br><br><br>
        <h1 style="text-align: center">TODO LIST:</h1>
        <div class="form mt-3">
            <form action="" method="post">
                <div class="row col-12">
                    <input class="form-control" type="text" name="text">
                </div>
                <div class="row col-12 mt-3">
                    <button  class="btn btn-success" style="text-align: center" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <?php if($result) :?>
                <?php foreach($result as $text): ?>
                    <h5 class="mt-4"><?= $text[1] ?></h5>
                    <a href="http://todo.com?id=<?=$text[0]?>"><button class="btn btn-danger">DONE!</button></a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>


