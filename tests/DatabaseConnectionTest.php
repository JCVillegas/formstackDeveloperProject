<?php


require_once('model_user.php');
require_once('database_config.php');
require_once('database_connection.php');

class DatabaseConnectionTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Database test to check connection.
     */
    public function testConnectDataBase(){

    	$database = new \JCVillegas\DevProject\Database();
    	$model = new \JCVillegas\DevProject\ModelUser($database);
    	$readUser=$model->getAllUsers();
    	$this->assertGreaterThan(0,count($readUser));

    }    


}