<?php

namespace JCVillegas\DevProject;

class ViewUserEdit
{
    public function show($userData = array(), $error = '',$update=false)
    {   
        $header = new ViewUserHeader();
        $footer = new ViewUserFooter();

        $emailValue = !empty($userData['Email']) ? trim(substr($userData['Email'], 0, 100)) : '';
        $firstNameValue = !empty($userData['FirstName']) ? trim(substr($userData['FirstName'], 0, 100)) : '';
        $lastNameValue = !empty($userData['LastName']) ? trim(substr($userData['LastName'], 0, 100)) : '';
        $password = !empty($userData['Password']) ? trim(substr($userData['Password'], 0, 100)) : '';

        $id = !empty($userData['id']) ? (int) $userData['id'] : 0;

        $createUserForm = "<form action='index.php?operation=SaveUser' method='post'>";
        $createUserForm .= "Email: <input type='text' name='Email' value='".htmlentities($emailValue)."'> <br>";
        $createUserForm .= "FirstName: <input type='text' name='FirstName' value='".htmlentities($firstNameValue)."'>";
        $createUserForm .= '<br>';
        $createUserForm .= "LastName: <input type='text' name='LastName' value='".htmlentities($lastNameValue)."'>";
        $createUserForm .= '<br>';
        if (!$update){
            $createUserForm .= "Password: <input type='password' name='Password' value='".htmlentities($password)."'>";
        }
        else{
            $createUserForm .= "<input type='hidden' name='updateForm' value='1'> <br>";
        }
        $createUserForm .= '<br>';
        $createUserForm .= "<input type='hidden' name='id' value='".htmlentities($id)."'> <br>";

        $createUserForm .= "<input type='submit' name='Save user'> </input>";
        $createUserForm .= "<br><a href='index.php?operation=ReadUsers'>Go back to list users</a>";
        $createUserForm .= '</form>';

        $header->show();
        if (!empty($error)) {
            echo $error.'<br>';
        }
        echo $createUserForm;
        $footer->show();
    }
}
