<?php

namespace JCVillegas\DevProject;

class ViewUserList
{
    public function show($list)
    {
        $header = new ViewUserHeader();
        $footer = new ViewUserFooter();

        $tableList = '<table border=1>';
        $tableList .= '<tr>';
        $tableList .= '<td>ID</td>';
        $tableList .= '<td>Email</td>';
        $tableList .= '<td>FirstName</td>';
        $tableList .= '<td>LastName</td>';
        $tableList .= '<td>Update Password</td>';
        $tableList .= '<td>Edit User</td>';
        $tableList .= '<td>Delete User</td>';
        $tableList .= '</tr>';

        foreach ($list as $key => $value) {
            $tableList .= '<tr>';
            $tableList .= '<td>'.htmlentities($value['id']).'</td>';
            $tableList .= '<td>'.htmlentities($value['Email']).'</td>';
            $tableList .= '<td>'.htmlentities($value['FirstName']).'</td>';
            $tableList .= '<td>'.htmlentities($value['LastName']).'</td>';
            $tableList .= '<td><a href="index.php?operation=UpdatePassword&id='.
            urlencode($value['id']).'">update password</a></td>';
            $tableList .= '<td><a href="index.php?operation=UpdateUser&id='.
            urlencode($value['id']).'">edit user</a></td>';
            $tableList .= '<td><a href="index.php?operation=ConfirmDeleteUser&id='.urlencode($value['id']).'">';
            $tableList .= 'delete user</a>';
            $tableList .= '</td>';
            $tableList .= '</tr>';
        }

        $tableList .= '</table>';

        $header->show();

        if (empty($list)) {
            echo 'No data yet.';
        } else {
            echo  "<a href='index.php?operation=CreateUser'>Create new user</a><br><br>";
            echo $tableList;
        }

        $footer->show();
    }
}
