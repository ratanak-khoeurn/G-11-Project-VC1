<!-- <h1>Hello</h1> -->
<?php
// require "../../database/database.php"
require "models/comments/comments.model.php";
// $comment = get_comment();
// var_dump($comment);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="../../vendor/css/customer.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
        <div class="container">
        <h1 style="margin: 20px 0px;">Comment Lists</h1>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Conten</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $comments = get_comment();
                    foreach ($comments as $index => $comment):
                        ?>
                        <tr>
                            <td>
                                <?= $index + 1 ?>
                            </td>
                            <td>
                                <?= $comment['content'] ?>
                            </td>
                            <td>
                                <?= $comment['first_name'].' '.$comment['last_name'] ?>
                            </td>
                            <td>
                                <?= $comment['date'] ?>
                            </td>
                            <td>
                                <img src='../../assets/images/user/<?= $comment["profile"] ?>' alt=""
                                    style="width: 60px;height:60px;border-radius:5px;">
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        
    </body>
</html>