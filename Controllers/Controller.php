<?php

namespace RatePage\Data;

class Controller {
    protected $dbContext;

    public function __construct($dbContext) {
        $this->dbContext = $dbContext;
    }

    protected function render($view, $title = "RatePage", $data = []) {
        extract($data);

        $content = "Views/$view.php";

        include "Views/master.php";
    }
}
?>