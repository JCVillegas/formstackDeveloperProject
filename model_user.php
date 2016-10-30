<?php

namespace JCVillegas\DevProject;

/**
*   @ MOdelUser class CRUD user data in database.
*/
class ModelUser
{
    private $database;
    /**
     * Select a list of all users data
     */
    function __construct($database)
    {
        $this->database=$database;
    }

    /**
     * Select a list of all users data
     */
    public function getAllUsers()
    {
        $list = array();
        $this->database->query('SELECT * FROM  '.DatabaseConfig::DB_TABLE);
        $rows = $this->database->resultset();
        return $rows;
    }
    /**
     * Select user data with specific id
     * @param int $userId
     * @return false if empty or array if true
     */
    public function getUser($userId)
    {
        $userId['id'] = !empty($userId['id']) ? (int) $userId['id'] : 0;
        if ($userId['id'] == 0) {
            return false;
        }

        
        $this->database->query('SELECT * FROM  '.DatabaseConfig::DB_TABLE.' WHERE id=:id');
        $this->database->bind(':id', $userId['id'], \PDO::PARAM_INT);
        $row = $this->database->resultset();
        if (empty($row)) {
            return false;
        } else {
            return $row[0];
        }
    }
    /**
     * Delete user with specific id
     * @param int $userId
     * @return  array $result
     */
    public function deleteUser($userId)
    {
        $userId['id'] = !empty($userId['id']) ? (int) $userId['id'] : 0;
        if ($userId['id'] == 0) {
            throw new \Exception('Incorrect user id.');
        }
        
        $this->database->query('DELETE FROM '.DatabaseConfig::DB_TABLE.' WHERE id=:id');
        $this->database->bind(':id', $userId['id'], \PDO::PARAM_INT);
        $result = $this->database->execute();

        return $result;
    }
    /**
     * Delete user with specific id
     * @param int $userId
     * @return  array $result
     */
    public function updatePassword($userPasswords)
    {
        $userPasswords['id'] = !empty($userPasswords['id']) ? (int) $userPasswords['id'] : 0;
        $userPasswords['currentPassword'] = !empty($userPasswords['currentPassword']) ?
        trim(substr($userPasswords['currentPassword'], 0, 100)) : '';
        $userPasswords['newPassword1'] = !empty($userPasswords['newPassword1']) ?
        trim(substr($userPasswords['newPassword1'], 0, 100)) : '';
        $userPasswords['newPassword2'] = !empty($userPasswords['newPassword2']) ?
        trim(substr($userPasswords['newPassword2'], 0, 100)) : '';

        if ($userPasswords['id'] == '' || $userPasswords['currentPassword'] == '' ||
          $userPasswords['newPassword1'] == '' ||
          $userPasswords['newPassword2'] == '') {
            throw new \Exception('Incomplete user data.');
        }

        if ($userPasswords['newPassword1'] != $userPasswords['newPassword2']) {
            throw new \Exception('New passwords do not match.');
        }

        
        $this->database->query('SELECT Password FROM  '.DatabaseConfig::DB_TABLE.' WHERE id=:id');
        $this->database->bind(':id', $userPasswords['id'], \PDO::PARAM_INT);
        $row = $this->database->resultset();

        if (empty($row[0]['Password']) || !password_verify($userPasswords['currentPassword'], $row[0]['Password'])) {
            throw new \Exception('Invalid current password.');
        }

        $userPasswords['newPassword1'] = password_hash($userPasswords['newPassword1'], PASSWORD_DEFAULT);
        $this->database->query('UPDATE '.DatabaseConfig::DB_TABLE.' SET Password=:Password WHERE id=:id');

        $this->database->bind(':Password', $userPasswords['newPassword1'], \PDO::PARAM_STR);
        $this->database->bind(':id', $userPasswords['id'], \PDO::PARAM_INT);

        $result = $this->database->execute();

        return $result;
    }
    /**
     * Create or update user
     * @param  array $userData
     * @return array $result
     */
    public function saveUser($userData)
    {
        $userData['id'] = !empty($userData['id']) ? (int) $userData['id'] : 0;
        $userData['Email'] = !empty($userData['Email']) ? trim(substr($userData['Email'], 0, 100)) : '';
        $userData['FirstName'] = !empty($userData['FirstName']) ? trim(substr($userData['FirstName'], 0, 100)) : '';
        $userData['LastName'] = !empty($userData['LastName']) ? trim(substr($userData['LastName'], 0, 100)) : '';
        $userData['Password'] = !empty($userData['Password']) ? trim(substr($userData['Password'], 0, 100)) : '';

        if ($userData['Email'] == '' || $userData['FirstName'] == '' || $userData['LastName'] == '') {
            throw new \Exception('Incomplete user data.');
        }

        

        if (empty($userData['id'])) {
            $this->database->query('SELECT * FROM  '.DatabaseConfig::DB_TABLE.' WHERE Email=:Email');
            $this->database->bind(':Email', $userData['Email'], \PDO::PARAM_STR);
            $row = $this->database->resultset();

            if (!empty($row)) {
                throw new \Exception('Cannot create user, email already exists.');
            } else {
                

                if ($userData['Password'] == '') {
                    throw new \Exception('Cannot create user, password is missing.');

                }

                $userData['Password'] = password_hash($userData['Password'], PASSWORD_DEFAULT);
                $this->database->query('INSERT INTO  '.DatabaseConfig::DB_TABLE.' (Email,FirstName,LastName,Password) 
                  VALUES (:Email,:FirstName,:LastName,:Password)');

                $this->database->bind(':Email', $userData['Email'], \PDO::PARAM_STR);
                $this->database->bind(':FirstName', $userData['FirstName'], \PDO::PARAM_STR);
                $this->database->bind(':LastName', $userData['LastName'], \PDO::PARAM_STR);
                $this->database->bind(':Password', $userData['Password'], \PDO::PARAM_STR);

                $result = $this->database->execute();

                return $result;
            }
        } else {
            $this->database->query('SELECT id FROM  '.DatabaseConfig::DB_TABLE.' WHERE Email=:Email');
            $this->database->bind(':Email', $userData['Email'], \PDO::PARAM_STR);
            $row = $this->database->resultset();

            if (empty($row[0]['id']) || (!empty($row) && $userData['id'] == $row[0]['id'])) {
                $this->database->query('UPDATE '.DatabaseConfig::DB_TABLE.' SET Email=:Email,FirstName=:FirstName,
                  LastName=:LastName WHERE id=:id');

                $this->database->bind(':Email', $userData['Email'], \PDO::PARAM_STR);
                $this->database->bind(':FirstName', $userData['FirstName'], \PDO::PARAM_STR);
                $this->database->bind(':LastName', $userData['LastName'], \PDO::PARAM_STR);
                $this->database->bind(':id', $userData['id'], \PDO::PARAM_INT);

                $result = $this->database->execute();

                return $result;
            } else {
                throw new \Exception('Cannot update user, email already exists.');
            }
        }
    }
}
