<?php

require_once('database_config.php');
require_once('database_connection.php');
require_once('controller_user.php');
require_once('model_user.php');
require_once('view_user_list.php');
require_once('view_user_edit.php');
require_once('view_user_delete.php');
require_once('view_user_message.php');
require_once('view_user_update_password.php');


class ControllerUserTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * Controller test.
     */
    public function testControllerCreateUser(){
            
        $database = new \JCVillegas\DevProject\Database();
        $model = new \JCVillegas\DevProject\ModelUser($database);
        $headerMock= new \JCVillegas\DevProject\ViewUserHeader;
        $footerMock= new \JCVillegas\DevProject\ViewUserFooter;
        $viewUserList = new \JCVillegas\DevProject\ViewUserList($headerMock,$footerMock);
        $viewUserEdit = new \JCVillegas\DevProject\ViewUserEdit($headerMock,$footerMock);
        $viewUserDelete = new \JCVillegas\DevProject\ViewUserDelete($headerMock,$footerMock);
        $viewUserMessage = new \JCVillegas\DevProject\ViewUserMessage($headerMock,$footerMock);
         $viewUpdatePassword = new \JCVillegas\DevProject\ViewUserUpdatePassword($headerMock,$footerMock);
        $controller = new \JCVillegas\DevProject\ControllerUser($model,$headerMock,$footerMock,$viewUserList,$viewUserEdit,$viewUserDelete,$viewUserMessage,$viewUpdatePassword); 
        
        
              
                

    }
  
}