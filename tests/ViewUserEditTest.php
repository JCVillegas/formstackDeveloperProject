<?php


require_once('view_user_edit.php');

class ViewUserEditTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * View test to display edit user form.
     */
    public function testViewUserEdit(){
    	
    	$headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserEdit($headerMock,$footerMock);
        ob_start();
        $post=array('Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password');
        $view->show($post,'',false);
        $viewEditContents= ob_get_contents();
        ob_end_clean();        
        $viewEmail=((int)stripos($viewEditContents,'test@jcvillegas.com'))>0;       
    	$this->assertTrue($viewEmail); 
        $viewFirstName=((int)stripos($viewEditContents,'Juan'))>0;       
        $this->assertTrue($viewFirstName); 
        $viewLastName=((int)stripos($viewEditContents,'Villegas'))>0;       
        $this->assertTrue($viewLastName); 
        $viewPassword=((int)stripos($viewEditContents,'password'))>0;       
        $this->assertTrue($viewPassword);             

    }  
    /**
     * View test to display create user form.
     */
    public function testViewUserCreate(){
        
        $headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserEdit($headerMock,$footerMock);
        ob_start();
        $post=array('Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password');
        $view->show($post,'',false);
        $viewEditContents= ob_get_contents();
        ob_end_clean();        
        $viewPasswordInput=((int)stripos($viewEditContents,'Password:'))>0;        
        $this->assertTrue($viewPasswordInput);             

    }   
    /**
     * View test to display user form with error message.
     */
    public function testViewUserCreateErrorMessage(){
        
        $headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserEdit($headerMock,$footerMock);
        ob_start();
        $post=array('Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password');
        $view->show($post,' ',true);
        $viewEditContents= ob_get_contents();
        ob_end_clean();        
        $viewError=((int)stripos($viewEditContents,'Go back to list users'))>0;     
        $this->assertTrue($viewError); 
           
            
        

    }   
  

}