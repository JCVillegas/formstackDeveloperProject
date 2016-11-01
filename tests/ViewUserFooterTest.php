<?php


require_once('view_user_footer.php');

class ViewUserFooterTest extends \PHPUnit_Framework_TestCase
{
        
    /**
     * View test to display footer.
     */
    public function testViewUserFooter(){
    	
    	$view = new \JCVillegas\DevProject\ViewUserFooter();
        ob_start();
        $view->show();
        $viewFooter= ob_get_contents();
        ob_end_clean();
        $viewFooter=(int)stripos($viewFooter,'/html');   	    	
    	$this->GreaterThan(0,0);       

    }

  


}