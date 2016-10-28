<?php


class model_user
{
    public function GetAllUsers()
    {
        $list = array();
        $database = new database();
        $database->query('SELECT * FROM  '.database_config::DB_TABLE);
        $rows = $database->resultset();

        return $rows;
    }
    /**
     * @param int $userId [Get user data from id]
     */
    public function GetUser($userId)
    {
        $userId['id'] = !empty($userId['id']) ? (int) $userId['id'] : 0;
        if ($userId['id'] == 0) {
            return false;
        }

        $database = new database();
        $database->query('SELECT * FROM  '.database_config::DB_TABLE.' WHERE id=:id');
        $database->bind(':id', $userId['id'], PDO::PARAM_INT);
        $row = $database->resultset();
        if (empty($row)) {
            return false;
        } else {
            return $row[0];
        }
    }

    public function DeleteUser($userId)
    {
        $userId['id'] = !empty($userId['id']) ? (int) $userId['id'] : 0;
        if ($userId['id'] == 0) {
            throw new Exception('Incorrect data.');
        }

        $database = new database();
        $database->query('DELETE FROM '.database_config::DB_TABLE.' WHERE id=:id');
        $database->bind(':id', $userId['id'], PDO::PARAM_INT);
        $result = $database->execute();

        return $result;
    }

    public function UpdateUser()
    {
    }

    public function SaveUser($userData)
    {
        $userData['id'] = !empty($userData['id']) ? (int) $userData['id'] : 0;
        $userData['Email'] = !empty($userData['Email']) ? trim(substr($userData['Email'], 0, 100)) : '';
        $userData['FirstName'] = !empty($userData['FirstName']) ? trim(substr($userData['FirstName'], 0, 100)) : '';
        $userData['LastName'] = !empty($userData['LastName']) ? trim(substr($userData['LastName'], 0, 100)) : '';
        $userData['Password'] = !empty($userData['Password']) ? trim(substr($userData['Password'], 0, 100)) : '';

        if ($userData['Email'] == '' || $userData['FirstName'] == '' || $userData['LastName'] == '' || $userData['Password'] == '') {
            throw new Exception('Incomplete data.');
        }

        $database = new database();

  //CREATE NEW USER
  if (empty($userData['id'])) {

    //VALIDATE EMAIL WHEN CREATING USER
    $database->query('SELECT * FROM  '.database_config::DB_TABLE.' WHERE Email=:Email');
      $database->bind(':Email', $userData['Email'], PDO::PARAM_STR);
      $row = $database->resultset();
      if (empty($row)) {
          throw new Exception('Cannot create user, email already exists.');
      } else {
          $database->query('INSERT INTO  '.database_config::DB_TABLE.' (Email,FirstName,LastName,Password) VALUES (:Email,:FirstName,:LastName,:Password)');

          $database->bind(':Email', $userData['Email'], PDO::PARAM_STR);
          $database->bind(':FirstName', $userData['FirstName'], PDO::PARAM_STR);
          $database->bind(':LastName', $userData['LastName'], PDO::PARAM_STR);
          $database->bind(':Password', $userData['Password'], PDO::PARAM_STR);

          $result = $database->execute();

          return $result;
      }
  }

 //UPDATE USER
 else {

  //VALIDATE EMAIL WHEN UPDATING USER
    $database->query('SELECT * FROM  '.database_config::DB_TABLE.' WHERE Email=:Email AND id=:id');
     $database->bind(':Email', $userData['Email'], PDO::PARAM_STR);
     $database->bind(':id', $userData['id'], PDO::PARAM_INT);
     $row = $database->resultset();
     if (empty($row)) {
         $database->query('UPDATE '.database_config::DB_TABLE.' SET Email=:Email,FirstName=:FirstName,LastName=:LastName,Password=:Password WHERE id=:id');

         $database->bind(':Email', $userData['Email'], PDO::PARAM_STR);
         $database->bind(':FirstName', $userData['FirstName'], PDO::PARAM_STR);
         $database->bind(':LastName', $userData['LastName'], PDO::PARAM_STR);
         $database->bind(':Password', $userData['Password'], PDO::PARAM_STR);
         $database->bind(':id', $userData['id'], PDO::PARAM_INT);

         $result = $database->execute();

         return $result;
     } else {
         throw new Exception('Cannot update user, email already exists.');
     }
 }
    }
}
