<?php

namespace RatePage\Data;

class Controller {
    protected $dbContext;

    public function __construct($dbContext) {
        $this->dbContext = $dbContext;
    }

    protected function redirect($location): void {
        header('Location:' .$location);
        exit;
    }

    protected function render($view, $title = "RatePage", $data = []): void {
        extract($data);

        $content = "Views/$view.php";

        include "Views/master.php";
    }
}
?>