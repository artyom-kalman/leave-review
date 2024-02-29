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

    public function success() {
        $this->render('Home/success', "Спасибо за ваш отзыв");
    }

    public function newReview($params = []) {
        if (!array_key_exists("userid", $params)) {
            $this->redirect('error');
        }
        
        $userId = $params['userid'];

        if ($this->dbContext->UserHasReview($userId)) {
            $this->redirect('success');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postNewReview($userId, $_POST["rating"], $_POST["comment"]);
        }

        if (!$this->dbContext->UserExist($userId)) {
            $this->redirect('error');
        }

        $this->render('Home/newReview', "Оставьте отзыв");
    }

    public function postNewReview($userId, $rating, $comment): void {
        $result = $this->dbContext->AddReview($userId, $rating, $comment);

        if (!$result) {
            $this->redirect('error');
        }

        $this->redirect('success');
    }
}
    