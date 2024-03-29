<?php

namespace RatePage\Controllers;

class Controller {
    protected $dbContext;

    public function __construct($dbContext) {
        $this->dbContext = $dbContext;
    }

    protected function redirect($location): void {
        header('Location:' .$location);
        exit;
    }

    protected function render($view, $title = "RatePage"): void {
        $content = "Views/$view.php";

        include "Views/master.php";
    }
}
?>