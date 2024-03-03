<?php

namespace RatePage\Data;

use RatePage\Models\Review;
use RatePage\Models\User;

class DbContext {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->PrepareQueries();
    }

    private function PrepareQueries(): void {
        pg_prepare(
            $this->connection, 
            'insert_review_query', 
            "INSERT INTO reviews(user_id, rating, comment) VALUES($1, $2, $3);"
        );
        pg_prepare(
            $this->connection, 
            'delete_reviews', 
            "DELETE FROM reviews;"
        );
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
        $result = pg_execute(
            $this->connection, 
            'insert_review_query', 
            array($review->userId, $review->rating, $review->comment)
        );
    
        if (!$result) return false;

        return true;
    }

    public function DeleteAllReviews(): void {
        $result = pg_execute(
            $this->connection, 
            'delete_reviews', 
            array()
        );
    }
}

?>