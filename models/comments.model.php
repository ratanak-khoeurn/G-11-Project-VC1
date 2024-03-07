<?php

require "../../database/database.php";
function store_comment(string $content, string $user): bool
{
    global $connection;
    $statement = $connection->prepare("insert into comments (content, user) values (:content, :user)");
    $statement->execute([
        ':content' => $content,
        ':user' => $user
    ]);
    return $statement->rowCount() > 0;
}
