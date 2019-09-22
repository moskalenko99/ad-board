<?php


namespace app\controllers;


use app\models\AppModel;
use ad\base\Controller;

class MainController extends Controller
{
    public $errors = array();

    public function getMessages(){
        $limit = '';
        if(isset($_POST['limit'])){
            $limit = $_POST['limit'];
        }else if(isset($_GET['limit'])){
            $limit = $_GET['limit'];
        }
        $limit = intval($limit);
        $limit= empty($limit) ? 10 : $limit;

        return AppModel::query()->getMess($limit);
    }

    public function validateForm()
    {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors[] = "Вы не ввели заголовок" . "<br>";
        }
        if (empty($_POST['description'])) {
            $errors[] = "Вы не ввели описание" . "<br>";
        }
        if (empty($_POST['name'])) {
            $errors[] = "Вы не ввели имя" . "<br>";
        }
        if (empty($_POST['email'])) {
            $errors[] = "Вы не ввели email" . "<br>";
        }
        if (empty($_POST['phone_number'])) {
            $errors[] = "Вы не ввели номер телефона" . "<br>";
        }
        if (empty($_POST['photo'])) {
            $errors[] = "Вы не ввели фото" . "<br>";
        }
        return $errors;
    }

    public function savePostAction()    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form_errors = $this->validateForm();
            if($form_errors) {
                $this->loadView('index', [
                    'messages' => $this->getMessages(),
                    'errors' => $form_errors,
                ]);
            } else {
                AppModel::query()->saveMessAd($_POST['title'], $_POST['description'], $_POST['photo'], $_POST['name'], $_POST['email'], $_POST['phone_number']);
                redirect('/?limit=' .  ( $_POST['limit'] ?? 0));
            }
        }
    }

    public function saveAuthorAction(){
        dd($_POST);
    }

    public function indexAction(){
        $this->loadView('index', [
            'messages' => $this->getMessages(),
        ]);
    }
}

