<?php

namespace JCVillegas\DevProject;

/**
*   @ View user update password class
*/
class ViewUserUpdatePassword
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
        $this->header = $header;
        $this->footer = $footer;
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

        $this->header->show();

        if (!empty($error)) {
            echo $error.'<br>';
        }

        echo $updatepasswordUserForm;

        $this->footer->show();
    }
}
