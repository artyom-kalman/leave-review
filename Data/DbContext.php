<?php

namespace RatePage\Data;

use RatePage\Models\Review;
use RatePage\Models\User;

class DbContext {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function UserExists(User $user): bool {
        $result = pg_select(
            $this->connection, 
            "users", 
            array("user_id" => $user->id)
        );

        if (!$result) {
            return false;
        }

        return true;
    }

    public function UserHasReview(User $user): bool {
        $result = pg_select(
            $this->connection, 
            "reviews", 
            array("user_id" => $user->id)
        );

        if (!$result) {
            return false;
        }

        return true;
    }

    public function AddReview(Review $review): bool {
        $result = pg_prepare(
            $this->connection, 
            'insert_review_query', 
            "INSERT INTO reviews(user_id, rating, comment) VALUES($1, $2, $3);"
        );
        if (!$result) return false;

        $result = pg_execute(
            $this->connection, 
            'insert_review_query', 
            array($review->userId, $review->rating, $review->comment)
        );
    
        if (!$result) return false;

        return true;
    }
}

?>