<?php

function store_comment(int $user_id, string $content): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO comments (user_id, content) VALUES (:user_id, :content)");
    $statement->execute([
        ':user_id' => $user_id,
        ':content' => $content
    ]);
    return $statement->rowCount() > 0;
}

function get_comment(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT c.content, u.first_name,u.last_name, u.picture ,c.date
                                       FROM comments c
                                       JOIN users u ON c.user_id = u.user_id");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
