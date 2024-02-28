<?php

namespace RatePage\Data;

class DbContext {
    var $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function UserExist($userId): bool {
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

    // TODO: Сделать параметризированный запрос
    public function AddReview($userId, $rating, $comment = null): bool {
        $query = "INSERT INTO reviews(user_id, rating, comment) VALUES($userId, $rating, $comment);";

        $result = pg_query($this->connection, $query);
    
        if (!$result) {
            return false;
        }

        return true;
    }
}

?>