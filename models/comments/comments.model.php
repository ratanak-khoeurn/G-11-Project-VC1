<?php
// require "database/database.php";

function store_comment(string $content, string $user, $profile): bool
{
    global $connection;
    $statement = $connection->prepare("insert into comments (content, user, profile) values (:content, :user, :profile)");
    $statement->execute([
        ':content' => $content,
        ':user' => $user,
        ':profile' => $profile

    ]);
    return $statement->rowCount() > 0;
}
function get_comment():array
{
    global $connection;
    $statement= $connection->prepare("select * from comments");
    $statement->execute();
    return $statement->fetchAll();
}
