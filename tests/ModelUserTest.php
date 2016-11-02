<?php


require_once('model_user.php');
require_once('database_config.php');
require_once('database_connection.php');

class ModelUserTest extends \PHPUnit_Framework_TestCase
{   

    
    /**
     * Model test to get  all users.
     */
    public function testReadUsers(){

        $mock=$this->createMock(\JCVillegas\DevProject\Database::class);
        $mock->method('query')->willReturn(true);
        $mock->method('bind')->willReturn(true);
        $mock->method('execute')->willReturn(true);
        $mock->method('resultset')->willReturn(array(
            array(
                'id'=>1,'Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password'),
                'id'=>2,'Email'=>'test2@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password'));
        $model = new \JCVillegas\DevProject\ModelUser($mock);
        $readUser=$model->getAllUsers();        
        $this->assertGreaterThan(0,count($mock));

    }

    /**
     * Model test to get  user by id.
     */
    public function testReadUser(){

    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array(array('id'=>1)));
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('id'=>1);
    	$resultUser=$model->getUser($post); 

    	

    }

    /**
     * Model test to get wrong user id.
     */
    public function testReadUserWrongId(){

        $mock=$this->createMock(\JCVillegas\DevProject\Database::class);
        $mock->method('query')->willReturn(true);
        $mock->method('bind')->willReturn(true);
        $mock->method('execute')->willReturn(true);
        $mock->method('resultset')->willReturn(array(array('id'=>1)));
        $model = new \JCVillegas\DevProject\ModelUser($mock);
        $post=array('id'=>0);
        $resultUser=$model->getUser($post);     
        

    }
    

    /**
     * Model test when a new user registers.
     */
    public function testSaveNewUsers(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password');
    	$resultUser=$model->saveUser($post);    	
    	$this->assertTrue($resultUser);
    }

    /**
     * Model test when a new user registers and Email already exists.
     */
    public function testSaveNewUsersEmailExists(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array(
    		array(
    		'id'=>1,'Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password')));
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);    	
    	
    }

    /**
     * Model test when a new user registers and Email field is incomplete.
     */
    public function testSaveUsersIncompleteDataEmail(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);    	   	
    	
    }

    /**
     * Model test when a new user registers and FirstName field is incomplete.
     */
    public function testSaveUsersIncompleteDataFirstName(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'','LastName'=>'Villegas','Password'=>'password');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);    	   	
    	
    }

    /**
     * Model test when a new user registers and LastName field is incomplete.
     */
    public function testSaveUsersIncompleteDataLastName(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'','Password'=>'password');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);    	   	
    	
    }

    /**
     * Model test when a new user registers and Password field is incomplete.
     */
    public function testSaveUsersIncompleteDataPassword(){
    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'');
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);    	   	
    	
    }

    /**
     * Model test when a new user updates fields.
     */

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

    /**
     * Model test when a new user updates fields and password already exists.
     */

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

    /**
     * Model test to delete user.
     */
    
    public function testDeleteUser(){    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array(array('id'=>1)));
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('id'=>1);
    	$resultUser=$model->deleteUser($post);    	
    	$this->assertTrue($resultUser);	
    }

    /**
     * Model test to delete user that doesnt exist.
     */
    
    public function testDeleteUserDoesntExist(){    	
    	$mock=$this->createMock(\JCVillegas\DevProject\Database::class);
    	$mock->method('query')->willReturn(true);
    	$mock->method('bind')->willReturn(true);
    	$mock->method('execute')->willReturn(true);
    	$mock->method('resultset')->willReturn(array());
    	$model = new \JCVillegas\DevProject\ModelUser($mock);
    	$post=array('id'=>0);
    	$this->expectException(\Exception::class);
    	$resultUser=$model->saveUser($post);     	
    }


    /**
     * Model test to update user password.
     */
    
    public function testUpdateUserPassword(){        
        $mock=$this->createMock(\JCVillegas\DevProject\Database::class);
        $mock->method('query')->willReturn(true);
        $mock->method('bind')->willReturn(true);
        $mock->method('execute')->willReturn(true);
        $mock->method('resultset')->willReturn(array());
        $model = new \JCVillegas\DevProject\ModelUser($mock);
        $post=array('id'=>3,'Email'=>'test@jcvillegas.com','FirstName'=>'Juan','LastName'=>'Villegas','Password'=>'password');        
        $resultUser=$model->updatePassword($post);
        $this->assertTrue($resultUser);         
    }


}