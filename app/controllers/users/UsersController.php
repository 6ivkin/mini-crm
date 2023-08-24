<?php
require_once 'app/models/User.php';

class UsersController
{

    public function index()
    {
        $userModel = new User();
        $users = $userModel->readAll();

        include 'app/views/users/index.php';
    }

    public function create()
    {
        include 'app/views/users/create.php';
    }

    public function store()
    {
        if (isset($_POST['login']) && $_POST['password'] && $_POST['confirm_password'] && $_POST['admin']) {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if($password !== $confirm_password){
                echo 'Password do not match';
                return;
            }

            $userModel = new User();
            $userModel->create($_POST);
        }
        header('Location: index.php?page=users');
    }

}