<?php

namespace JCVillegas\DevProject;

/**
*   @ User controller class
*/
class ControllerUser
{
    private $model;
    /**
     *  @ Class constructor.
     */
    public function __construct()
    {
        $this->model = new modelUser();
    }
    /**
     *  @ View a form to create user.
     */
    public function createUser()
    {
        $view = new ViewUserEdit();
        $view->show();
    }
    /**
     *  @ View a list of  all users.
     */
    public function readUsers()
    {
        $view = new ViewUserList();
        $list = $this->model->getAllUsers();
        $view->show($list);
    }
    /**
     *  @ Update user using id.
     */
    public function updateUser()
    {
        $view = new ViewUserEdit();
        $userData = $this->model->getUser($_GET);

        if ($userData) {
            $view->show($userData, '', true);
        } else {
            $view = new viewUserMessage();
            $view->show('There was an error.');
        }
    }
    /**
     *  @ View change password form.
     */
    public function updatePassword()
    {
        $view = new viewUserUpdatePassword();
        $view->show($_GET);
    }
    /**
     *  @ Update  user password with id.
     */
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
    /**
     *  @ View confirm message to delete user.
     */
    public function confirmDeleteUser()
    {
        $view = new viewUserDelete();
        $view->show($_GET);
    }
    /**
     *  @ Delete user.
     */
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
    /**
     *  @ Update or create user.
     */
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
            $view->show($_POST, $error, $updateForm);
        }
    }
}
