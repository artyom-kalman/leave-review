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

    public function newReview($params = []) {
        if (!array_key_exists("userid", $params)) {
            header('Location: error');
            exit;
        }

        $userId = $params['userid'];

        if (!$this->dbContext->UserExist($userId)) {
            header('Location: error');
            exit;
        }

        $this->render('Home/newReview', "Оставьте отзыв");
    }
}
    