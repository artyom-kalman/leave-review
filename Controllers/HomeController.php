<?php

namespace RatePage\Controllers;

include "Data/Controller.php";
use RatePage\Data\Controller;
include "Models/Review.php";
use RatePage\Models\Review;

class HomeController extends Controller {
    public function index() {
        $this->render('Home/index');
    }

    public function error() {
        $this->render('Home/error');
    }

    public function newReview() {
        $this->render('Home/newReview');
    }
}
    