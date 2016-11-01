<?php

namespace JCVillegas\DevProject;

/**
*   @ User controller class
*/
class ControllerUser
{
    private $model;
    private $viewHeader;
    private $viewFooter;
    private $viewList;
    private $viewEdit;
    private $viewDelete;
    private $viewMessage;
    private $viewPassword;
    /**
     *  @ Class constructor.
     */
    public function __construct(
        ModelUser $model,
        ViewUserHeader $viewHeader,
        ViewUserFooter $viewFooter,
        ViewUserList $viewList,
        ViewUserEdit $viewEdit,
        ViewUserDelete $viewDelete,
        ViewUserMessage $viewMessage,
        ViewUserUpdatePassword $viewPassword
    ) {
    
        $this->model =  $model;
        $this->viewHeader = $viewHeader;
        $this->viewFooter = $viewFooter;
        $this->viewList = $viewList;
        $this->viewEdit = $viewEdit;
        $this->viewDelete = $viewDelete;
        $this->viewMessage = $viewMessage;
        $this->viewPassword = $viewPassword;
    }
    /**
     *  @ View a form to create user.
     */
    public function createUser()
    {
        $this->viewEdit->show();
    }
    /**
     *  @ View a list of  all users.
     */
    public function readUsers()
    {
        $list = $this->model->getAllUsers();
        $this->viewList->show($list);
    }
    /**
     *  @ Update user using id.
     */
    public function updateUser()
    {
        
        $userData = $this->model->getUser($_GET);

        if ($userData) {
            $this->viewEdit->show($userData, '', true);
        } else {
            $this->viewMessage->show('There was an error.');
        }
    }
    /**
     *  @ View change password form.
     */
    public function updatePassword()
    {
        $this->viewPassword->show($_GET);
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

        
        if (empty($message)) {
            $this->viewMessage->show('The user password has been updated.');
        } else {
            $error = 'There was an error: '.$message;

            $this->viewPassword->show($_POST, $error);
        }
    }
    /**
     *  @ View confirm message to delete user.
     */
    public function confirmDeleteUser()
    {
        $this->viewDelete->show($_GET);
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
        

        if (empty($message)) {
            $this->viewMessage->show('The user has been deleted.');
        } else {
            $this->viewMessage->show('There was an error: '.$message);
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
       

        if (empty($message)) {
            $this->viewMessage->show('The user has been saved.');
        } else {
            $error = 'There was an error: '.$message;
            $this->viewEdit->show($_POST, $error, $updateForm);
        }
    }
}
