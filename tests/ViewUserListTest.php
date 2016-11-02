<?php


require_once('view_user_list.php');

class ViewUserListTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * View test to display users list.
     */
    public function testViewUserList(){
    	
    	$headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserList($headerMock,$footerMock);
        ob_start();
        $post=array(
            array('id'=>'1','Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas'),
            array('id'=>'2','Email'=>'test2@jcvillegas.com','FirstName'=>'Juan2','LastName'=>'Villegas2'));
        $view->show($post);
        $viewListContents= ob_get_contents();
        ob_end_clean();        
        $viewUsers=((int)stripos($viewListContents,'index'))>0;     
    	$this->assertTrue($viewUsers);           

    } 

    /**
     * View test to display users list empty.
     */
    public function testViewUserListNoData(){
        
        $headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserList($headerMock,$footerMock);
        ob_start();
        $post=array();
        $view->show($post);
        $viewListContents= ob_get_contents();
        ob_end_clean();        
        $viewUsers=((int)stripos($viewListContents,'data'))>0;     
        $this->assertTrue($viewUsers);           

    } 
  
    
  

}