<?php


class controller_user
{
    private $model;

    public function __construct()
    {
        $this->model = new model_user();
    }

    public function CreateUser()
    {
        $view = new view_user_edit();
        $view->Show();
    }

    public function ReadUsers()
    {
        $view = new view_user_list();
        $list = $this->model->GetAllUsers();
        $view->Show($list);
    }

    public function UpdateUser()
    {
        $view = new view_user_edit();
        $userData = $this->model->GetUser($_GET);

        if ($userData) {
            $view->Show($userData);
        } else {
            $view = new view_user_message();
            $view->Show('There was an error.');
        }
    }

    public function DeleteUser()
    {
        $message = '';

        try {
            $userToDelete = $this->model->DeleteUser($_GET);
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        $view = new view_user_message();

        if (empty($message)) {
            $view->Show('The user has been deleted.');
        } else {
            $view->Show('There was an error: '.$message);
        }
    }

    public function SaveUser()
    {
        $message = '';

        try {
            $result = $this->model->SaveUser($_POST);
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        $view = new view_user_message();

        if (empty($message)) {
            $view->Show('The user has been saved.');
        } else {
            $view->Show('There was an error: '.$message);
        }
    }
}
