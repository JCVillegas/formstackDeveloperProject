<?php


require_once('view_user_header.php');

class ViewUserHeaderTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * View test to display header.
     */
    public function testViewUserHeader(){
    	
    	$view = new \JCVillegas\DevProject\ViewUserHeader();
        ob_start();
        $view->show();
        $viewHeader= ob_get_contents();
        ob_end_clean();        
        $viewHeader=((int)stripos($viewHeader,'html'))>0;       
    	$this->assertTrue($viewHeader);       

    }

  
}