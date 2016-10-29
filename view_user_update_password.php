<?php


class view_user_update_password
{
    public function Show($id, $error = '')
    {
        $header = new view_user_header();
        $footer = new view_user_footer();

        $updatepasswordUserForm = "<form action='index.php?operation=SavePassword' method='post'>";
        $updatepasswordUserForm .= "Type current password: <input type='password' name='currentPassword'> <br>";
        $updatepasswordUserForm .= "Type new password : <input type='password' name='newPassword1'><br>";
        $updatepasswordUserForm .= "Retype new password : <input type='password' name='newPassword2'><br>";
        $updatepasswordUserForm .= "<input type='hidden' name='id' value='".htmlentities($id['id'])."'> <br>";
        $updatepasswordUserForm .= "<input type='submit' name='Save user'>";
        $updatepasswordUserForm .= "<br><a href='index.php?operation=ReadUsers'>Go back to list users</a>";
        $updatepasswordUserForm .= '</form>';

        $header->Show();

        if (!empty($error)) {
            echo $error.'<br>';
        }

        echo $updatepasswordUserForm;

        $footer->Show();
    }
}
