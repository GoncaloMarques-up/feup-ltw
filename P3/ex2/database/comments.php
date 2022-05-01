<?php 

    require_once('connection.php');

    function getCommentsFor(PDO $db, int $id): array|false {
        
        $comments_query = 'SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?';
        $comments_count_query = 'SELECT count(*) AS comment_count FROM comments WHERE news_id = ?';

        if (strcmp(gettype($comments = getQueryResults($db, $comments_query, true, array($id))), "array") !== 0 && !$comments)
            return false;

        if (strcmp(gettype($comments_amount = getQueryResults($db, $comments_count_query, false, array($id))), "array") !== 0 && !$comments_amount)
            return false;     

        return array($comments, $comments_amount);
    }

    function createComment(PDO $db, array $data): array {
        
        $query = 'INSERT INTO comments VALUES (NULL, ?, ?, unixepoch("now"), ?)';

        return executeQuery($db, $query, $data);
    }

?>