<?php


require_once('view_user_update_password.php');

class ViewUserUpdatePasswordTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * View test to display a message to the user.
     */
    public function testViewUpdatePassword(){
    	
    	$headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserUpdatePassword($headerMock,$footerMock);
        ob_start();
        $post=array('id'=>'1');
        $view->show($post,'');
        $viewUpdatePassword= ob_get_contents();
        ob_end_clean();        
        $viewUpdatePassword=((int)stripos($viewUpdatePassword,'1'))>0;     
    	$this->assertTrue($viewUpdatePassword);           

    }

    /**
     * View test to display a message to the user and error message.
     */
    public function testViewUpdatePasswordError(){
        
        $headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserUpdatePassword($headerMock,$footerMock);
        ob_start();
        $post=array('id'=>'1');
        $view->show($post,'error');
        $viewUpdatePassword= ob_get_contents();
        ob_end_clean();        
        $viewUpdatePassword=((int)stripos($viewUpdatePassword,'form'))>0;     
        $this->assertTrue($viewUpdatePassword);           

    }      
  

}