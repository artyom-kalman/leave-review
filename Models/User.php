<?php

namespace RatePage\Models;

class User {
    public $id;

    public function __construct($id)  {
        $this->id = $id;
    }
}
?>