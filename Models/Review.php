<?php

namespace RatePage\Models;

class Review {
    public $id;
    public $user_id;
    public $rating;
    public $comment;

    public function __construct($id, $user_id, $rating, $comment)  {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->rating = $rating;
        $this->comment = $comment;
    }
}
?>