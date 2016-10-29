<?php

class view_user_edit
{
    public function Show($userData = array(), $error = '')
    {
        $header = new view_user_header();
        $footer = new view_user_footer();

        $emailValue = !empty($userData['Email']) ? trim(substr($userData['Email'], 0, 100)) : '';
        $firstNameValue = !empty($userData['FirstName']) ? trim(substr($userData['FirstName'], 0, 100)) : '';
        $lastNameValue = !empty($userData['LastName']) ? trim(substr($userData['LastName'], 0, 100)) : '';
        $password = !empty($userData['Password']) ? trim(substr($userData['Password'], 0, 100)) : '';

        $id = !empty($userData['id']) ? (int) $userData['id'] : 0;

        $createUserForm = "<form action='index.php?operation=SaveUser' method='post'>";
        $createUserForm .= "Email: <input type='text' name='Email' value='".htmlentities($emailValue)."'> </input><br>";
        $createUserForm .= "FirstName: <input type='text' name='FirstName' value='".htmlentities($firstNameValue)."'> </input><br>";
        $createUserForm .= "LastName: <input type='text' name='LastName' value='".htmlentities($lastNameValue)."'> </input><br>";
        $createUserForm .= "Password: <input type='password' name='Password' value='".htmlentities($password)."'> </input><br>";
        $createUserForm .= "<input type='hidden' name='id' value='".htmlentities($id)."'> </input><br>";
        $createUserForm .= "<input type='submit' name='Save user'> </input>";
        $createUserForm .= "<br><a href='index.php?operation=ReadUsers'>Go back to list users</a>";
        $createUserForm .= '</form>';

        $header->Show();
        if (!empty($error)) {
            echo $error;
        }
        echo $createUserForm;
        $footer->Show();
    }
}
