<?php

namespace RatePage\Data;

class DbContext {
    var $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function UserExists($userId): bool {
        $result = pg_select(
            $this->connection, 
            "users", 
            array("user_id" => $userId)
        );

        if (!$result) {
            return false;
        }

        return true;
    }

    public function UserHasReview($userId): bool {
        $result = pg_select(
            $this->connection, 
            "reviews", 
            array("user_id" => $userId)
        );

        if (!$result) {
            return false;
        }

        return true;
    }

    public function AddReview($userId, $rating, $comment = null): bool {
        $result = pg_prepare(
            $this->connection, 
            'insert_review_query', 
            "INSERT INTO reviews(user_id, rating, comment) VALUES($1, $2, $3);"
        );
        if (!$result) return false;

        $result = pg_execute(
            $this->connection, 
            'insert_review_query', 
            array($userId, $rating, $comment)
        );
    
        if (!$result) return false;

        return true;
    }
}

?>