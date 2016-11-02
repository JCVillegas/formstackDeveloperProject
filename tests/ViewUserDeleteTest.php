<?php


require_once('view_user_delete.php');

class ViewUserDeleteTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * View test to display edit user form.
     */
    public function testViewUserDelete(){
    	
    	$headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserDelete($headerMock,$footerMock);
        ob_start();
        $post=array('id'=>'1');
        $view->show($post);
        $viewDeleteUser= ob_get_contents();
        ob_end_clean();        
        $viewDeleteUser=((int)stripos($viewDeleteUser,'1'))>0;     
    	$this->assertTrue($viewDeleteUser); 
          

    }   
  

}