<?php

namespace JCVillegas\DevProject;

/**
*   @ View user edit class to change user data
*/
class ViewUserEdit
{

    private $header;
    private $footer;

    /**
     *  Class constructor
     *  @param   $header  View of the header
     *  @param   $footer  View of the footer
     */
    public function __construct(ViewUserHeader $header, ViewUserFooter $footer)
    {
            
        $this->header=$header;
        $this->footer=$footer;
    }

    /**
     * Shows Header, user edit form and footer
     * @param array $userData
     * @param string $error
     * @param boolean $update
     * @return void
     */
    public function show($userData = array(), $error = '', $update = false)
    {
        
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
        if (!$update) {
            $createUserForm .= "Password: <input type='password' name='Password' value='".htmlentities($password)."'>";
        } else {
            $createUserForm .= "<input type='hidden' name='updateForm' value='1'> <br>";
        }
        $createUserForm .= '<br>';
        $createUserForm .= "<input type='hidden' name='id' value='".htmlentities($id)."'> <br>";

        $createUserForm .= "<input type='submit' name='Save user'> </input>";
        $createUserForm .= "<br><a href='index.php?operation=ReadUsers'>Go back to list users</a>";
        $createUserForm .= '</form>';

        $this->header->show();
        if (!empty($error)) {
            echo $error.'<br>';
        }
        echo $createUserForm;
        $this->footer->show();
    }
}
