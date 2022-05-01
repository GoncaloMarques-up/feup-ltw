<?php
    require_once('connection.php');

    function getAllArticles(PDO $db): array|false {
        $query = 'SELECT news.*, users.*, COUNT(comments.id) AS comments
            FROM news JOIN
                users USING (username) LEFT JOIN
                comments ON comments.news_id = news.id
            GROUP BY news.id, users.username
            ORDER BY published DESC';

        return getQueryResults($db, $query);
    }

    function getArticle(PDO $db, int $id): array|false {
        $query = 'SELECT * FROM news JOIN users USING (username) WHERE id = ?';

        return getQueryResults($db, $query, false, array($id));
    }

    function updateArticle(PDO $db, int $id, array $data): bool {
        
        $query = 'UPDATE news SET title = ?, introduction = ?, fulltext = ? WHERE news.id = ?';

        $data[] = $id;

        return executeQuery($db, $query, $data)[0];
    }

    function createArticle(PDO $db, array $data): int {
        $create_query = 'INSERT INTO news VALUES(NULL, ?, unixepoch("now"), ?, ?, ?, ?)';
        $id_query = 'SELECT id FROM news WHERE title = ? AND tags = ? AND username = ?';

        list($title, $tags, $username, $introduction, $fulltext) = $data;

        if (executeQuery($db, $create_query, $data)[0]) {
        
            if ($result = getQueryResults($db, $id_query, false, array($title, $tags, $username)))
                return $result['id'];
        }

        return -1;
    }

    function deleteArticle(PDO $db, int $article_id): bool {
        $delete_comments_query = 'DELETE FROM comments WHERE news_id = ?';
        $delete_query = 'DELETE FROM news WHERE id = ?';

        $data = array($article_id);

        return executeQuery($db, $delete_comments_query, $data) && executeQuery($db, $delete_query, $data);
    }
?>