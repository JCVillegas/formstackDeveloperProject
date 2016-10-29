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

    public function UpdatePassword()
    {
        $view = new view_user_update_password();
        $view->Show($_GET);
    }

    public function SavePassword()
    {
        $message = '';

        try {
            $updatePassword = $this->model->UpdatePassword($_POST);
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        $view = new view_user_message();

        if (empty($message)) {
            $view->Show('The user password has been updated.');
        } else {
            $error = 'There was an error: '.$message;

            $view = new view_user_update_password();
            $view->Show($_POST, $error);
        }
    }

    public function ConfirmDeleteUser()
    {
        $view = new view_user_delete();
        $view->Show($_GET);
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
            $error = 'There was an error: '.$message;
            $view = new view_user_edit();
            $view->Show($_POST, $error);
        }
    }
}
