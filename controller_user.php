<?php




class controller_user {

   
   private $model;


   public function __construct () {    
     $this->model = new model_user;
   }


   public function CreateUser () {

     $view = new view_user_edit();
     $view->Show ();


   }


  public function ReadUsers () {
    $view = new view_user_list;
    $list = $this->model->GetAllUsers ();
    $view->Show ($list);
  }


   public function UpdateUser () {
   }


   public function DeleteUser () {
   }


public function SaveUser () {

  $result=$this->model->SaveUser ($_POST);
  $view = new view_user_message();

  if ($result)
  {
   
    $view->Show ('The user has been created.');
  }

  else{

     $view->Show ('There was an error with the database.');


  }





  
   }

   


   



}


