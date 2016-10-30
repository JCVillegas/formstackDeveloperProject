<?php



require_once('model_user.php');
require_once('database_config.php');
require_once('database_connection.php');

class DevProjectTest extends \PHPUnit_Framework_TestCase
{
    

    public function testReadUsers(){

    	$database = new \JCVillegas\DevProject\Database();
    	$model = new \JCVillegas\DevProject\ModelUser($database);
    	$readUser=$model->getAllUsers();
    	$this->assertGreaterThan(0,count($readUser));

    }

    
    public function testReadUsers2(){

    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array(
    		array(
    			'id'=>1,'Email'=>'test@jcvillegas.com','FirstName'=>'8686','LastName'=>'uttu','Password'=>'uytuyt'),
    			'id'=>2,'Email'=>'test2@jcvillegas.com','FirstName'=>'8686','LastName'=>'uttu','Password'=>'uytuyt'));
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$readUser=$model->getAllUsers();    	
    	$this->assertGreaterThan(0,count($mock));

    }


    public function testSaveNewUsers(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'8686','LastName'=>'uttu','Password'=>'uytuyt');
    	$resultUser=$model->saveUser($post);    	
    	$this->assertTrue($resultUser);
    }


    public function testSaveNewUsersEmailExists(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array(
    		array(
    		'id'=>1,'Email'=>'test@jcvillegas.com','FirstName'=>'8686','LastName'=>'uttu','Password'=>'uytuyt')));
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'8686','LastName'=>'uttu','Password'=>'uytuyt');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);    	
    	
    }


    public function testSaveUsersIncompleteData(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'','LastName'=>'uttu','Password'=>'uytuyt');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);    	   	
    	
    }

    public function testSaveUpdateUsers(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array(array('id'=>1)));
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('id'=>1,'Email'=>'test@jcvillegas.com','FirstName'=>'8686','LastName'=>'uttu','Password'=>'uytuyt');
    	$resultUser=$model->saveUser($post);    	
    	$this->assertTrue($resultUser);
    }

    public function testSaveUpdateUsersEmailExists(){    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array(array('id'=>1)));
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('id'=>3,'Email'=>'test@jcvillegas.com','FirstName'=>'8686','LastName'=>'uttu','Password'=>'uytuyt');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);     	
    }






}