<?php

namespace JCVillegas\DevProject;

/**
*   @ View user update password class
*/
class ViewUserUpdatePassword
{
    
    private $viewHeader;
    private $viewFooter;
    
    /**
     *  Class constructor
     *  @param   $header  View of the header
     *  @param   $footer  View of the footer
     */
    public function __construct(ViewUserHeader $viewHeader, ViewUserFooter $viewFooter)
    {
        $this->viewHeader = $viewHeader;
        $this->viewFooter = $viewFooter;
    }

    /**
     * Shows user update password form
     * @param int id
     * @param string $error
     * @return void
     */
    public function show($id, $error = '')
    {
        
        $updatepasswordUserForm = "<form action='index.php?operation=SavePassword' method='post'>";
        $updatepasswordUserForm .= "Type current password: <input type='password' name='currentPassword'> <br>";
        $updatepasswordUserForm .= "Type new password : <input type='password' name='newPassword1'><br>";
        $updatepasswordUserForm .= "Retype new password : <input type='password' name='newPassword2'><br>";
        $updatepasswordUserForm .= "<input type='hidden' name='id' value='".htmlentities($id['id'])."'> <br>";
        $updatepasswordUserForm .= "<input type='submit' name='Save user'>";
        $updatepasswordUserForm .= "<br><a href='index.php?operation=ReadUsers'>Go back to list users</a>";
        $updatepasswordUserForm .= '</form>';

        $this->viewHeader->show();

        if (!empty($error)) {
            echo $error.'<br>';
        }

        echo $updatepasswordUserForm;

        $this->viewFooter->show();
    }
}
