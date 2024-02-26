<?php

namespace RatePage\Data;

class Controller {
    protected function render($view, $title = "RatePage", $data = []) {
        extract($data);

        $content = "Views/$view.php";

        include "Views/master.php";
    }
}
?>