<?php

namespace JCVillegas\DevProject;

class ControllerUser
{
    private $model;

    public function __construct()
    {
        $this->model = new modelUser();
    }

    public function createUser()
    {
        $view = new ViewUserEdit();
        $view->show();
    }

    public function readUsers()
    {
        $view = new ViewUserList();
        $list = $this->model->getAllUsers();
        $view->show($list);
    }

    public function updateUser()
    {
        $view = new ViewUserEdit();
        $userData = $this->model->getUser($_GET);

        if ($userData) {
            $view->show($userData,'',true);
        } else {
            $view = new viewUserMessage();
            $view->show('There was an error.');
        }
    }

    public function updatePassword()
    {
        $view = new viewUserUpdatePassword();
        $view->show($_GET);
    }

    public function savePassword()
    {
        $message = '';

        try {
            $updatePassword = $this->model->updatePassword($_POST);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        $view = new viewUserMessage();

        if (empty($message)) {
            $view->show('The user password has been updated.');
        } else {
            $error = 'There was an error: '.$message;

            $view = new viewUserUpdatePassword();
            $view->show($_POST, $error);
        }
    }

    public function confirmDeleteUser()
    {
        $view = new viewUserDelete();
        $view->show($_GET);
    }

    public function deleteUser()
    {
        $message = '';

        try {
            $userToDelete = $this->model->deleteUser($_GET);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        $view = new viewUserMessage();

        if (empty($message)) {
            $view->show('The user has been deleted.');
        } else {
            $view->show('There was an error: '.$message);
        }
    }

    public function saveUser()
    {
        $updateForm=!empty($_POST['updateForm']);        
        
        $message = '';

        try {
            $result = $this->model->saveUser($_POST);
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        $view = new viewUserMessage();

        if (empty($message)) {
            $view->show('The user has been saved.');
        } else {
            $error = 'There was an error: '.$message;
            $view = new viewUserEdit();
            $view->show($_POST, $error,$updateForm);
        }
    }
}
