<?php

namespace RatePage\Controllers;

include "Controller.php";
use RatePage\Data\Controller;
include "Models/Review.php";
use RatePage\Models\Review;

include 'src/validation.php';

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

    public function newReview(): void {
        if (!array_key_exists("userid", $_GET)) {
            $this->redirect('error');
        }
        
        $userId = $_GET['userid'];

        if (!$this->dbContext->UserExists($userId)) {
            $this->redirect('error');
        }

        if ($this->dbContext->UserHasReview($userId)) {
            $this->redirect('success');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postNewReview($userId, $_POST["rating"], $_POST["comment"]);
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->getNewReview();
        }
    }

    public function getNewReview(): void {
        $this->render('Home/newReview', "Оставьте отзыв");
    }

    public function postNewReview($userId, $rating, $comment): void {
        $comment = validateTextInput($comment);

        $result = $this->dbContext->AddReview($userId, $rating, $comment);

        if (!$result) {
            $this->redirect('error');
        }

        $this->redirect('success');
    }
}
    