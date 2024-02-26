<?php

namespace RatePage\Controllers;

include "Controller.php";
use RatePage\Data\Controller;
include "Models/Review.php";
use RatePage\Models\Review;

class HomeController extends Controller {
    public function index() {
        $this->render('Home/index', "Home");
    }

    public function error() {
        $this->render('Home/error', "Что-то пошло не так");
    }

    public function newReview() {
        $this->render('Home/newReview', "Оставьте отзыв");
    }
}
    