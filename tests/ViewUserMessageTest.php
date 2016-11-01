<?php


require_once('view_user_message.php');

class ViewUserMessageTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * View test to display messages.
     */
    public function testViewUserMessage(){
    	
    	$headerMock=$this->createMock(\JCVillegas\DevProject\ViewUserHeader::class);
        $footerMock=$this->createMock(\JCVillegas\DevProject\ViewUserFooter::class);
        $view = new \JCVillegas\DevProject\ViewUserMessage($headerMock,$footerMock);
        ob_start();        
        $view->show('This is a test message');
        $viewMessage= ob_get_contents();
        ob_end_clean();        
        $viewMessage=((int)stripos($viewMessage,'message'))>0;       
    	$this->assertTrue($viewMessage);                

    }
  
}