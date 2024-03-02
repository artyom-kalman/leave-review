<?php

namespace RatePage\Controllers;

require "Controller.php";

require "Models/Review.php";
require "Models/User.php";

require 'src/validation.php';

use RatePage\Models\User;
use RatePage\Models\Review;


class HomeController extends Controller {
    public function index(): void {
        $this->redirect('error');
    }

    public function error(): void {
        $this->render('Home/error', "Что-то пошло не так");
    }

    public function success(): void {
        $this->render('Home/success', "Спасибо за ваш отзыв");
    }

    public function newReview(): void {
        if (!array_key_exists("userid", $_GET)) {
            $this->redirect('error');
        }
        
        $userId = $_GET['userid'];

        $user = new User();
        $user->userId = $userId;

        if (!$this->dbContext->UserExists($user)) {
            $this->redirect('error');
        }

        if ($this->dbContext->UserHasReview($user)) {
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

        $newReview = new Review();
        $newReview->userId = $userId;
        $newReview->rating = $rating;
        $newReview->comment = $comment;

        $result = $this->dbContext->AddReview($newReview);

        if (!$result) {
            $this->redirect('error');
        }

        $this->redirect('success');
    }
}
    