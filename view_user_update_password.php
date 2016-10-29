<?php


class ViewUserUpdatePassword
{
    public function show($id, $error = '')
    {
        $header = new ViewUserHeader();
        $footer = new ViewUserFooter();

        $updatepasswordUserForm = "<form action='index.php?operation=SavePassword' method='post'>";
        $updatepasswordUserForm .= "Type current password: <input type='password' name='currentPassword'> <br>";
        $updatepasswordUserForm .= "Type new password : <input type='password' name='newPassword1'><br>";
        $updatepasswordUserForm .= "Retype new password : <input type='password' name='newPassword2'><br>";
        $updatepasswordUserForm .= "<input type='hidden' name='id' value='".htmlentities($id['id'])."'> <br>";
        $updatepasswordUserForm .= "<input type='submit' name='Save user'>";
        $updatepasswordUserForm .= "<br><a href='index.php?operation=ReadUsers'>Go back to list users</a>";
        $updatepasswordUserForm .= '</form>';

        $header->show();

        if (!empty($error)) {
            echo $error.'<br>';
        }

        echo $updatepasswordUserForm;

        $footer->show();
    }
}
