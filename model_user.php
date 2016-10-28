<?php





class model_user {



  
   function GetAllUsers () {
     $list = array ();     /** aqui va el SQL **/
     $database = new database();
     $database->query('SELECT * FROM  '.database_config::DB_TABLE);
     $rows = $database->resultset();
     return ($rows);
   }


   function GetUser () {
   }


   function DeleteUser () {
   }


   function UpdateUser () {
   }

   function SaveUser ($userData) {
    

     
    
    $userData['Email'] = !empty ($userData['Email']) ? trim (substr ($userData['Email'], 0, 100)) : "";
    $userData['FirstName'] = !empty ($userData['FirstName']) ? trim (substr ($userData['FirstName'], 0, 100)) : "";  
    $userData['LastName'] = !empty ($userData['LastName']) ? trim (substr ($userData['LastName'], 0, 100)) : "";  
    $userData['Password'] = !empty ($userData['Password']) ? trim (substr ($userData['Password'], 0, 100)) : "";  

     
   if ($userData['Email']=="" ||$userData['FirstName']=="" || $userData['LastName']=="" || $userData['Password']==""){
    return false;
  }




  $database = new database();
  $database->query('INSERT INTO  '.database_config::DB_TABLE. ' (Email,FirstName,LastName,Password) VALUES (:Email,:FirstName,:LastName,:Password)');

   $database->bind(':Email', $userData['Email'],PDO::PARAM_STR);
   $database->bind(':FirstName', $userData['FirstName'],PDO::PARAM_STR);
   $database->bind(':LastName', $userData['LastName'],PDO::PARAM_STR);
   $database->bind(':Password', $userData['Password'],PDO::PARAM_STR);

   $result=$database->execute();   
   

   return $result;
    





   }





}

