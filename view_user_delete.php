<?php

require_once 'view_user_header.php';
require_once 'view_user_footer.php';
class view_user_delete
{
    public function Show($id)
    {
        $header = new view_user_header();
        $footer = new view_user_footer();

        $tableConfirm = '<table border=1>';
        $tableConfirm .= '<tr>';
        $tableConfirm .= '<td colspan=2>Confirm delete User</td>';
        $tableConfirm .= '</tr>';
        $tableConfirm .= '<tr>';
        $tableConfirm .= '<td><a href="index.php?operation=DeleteUser&id='.urlencode($id['id']).'">Yes</a></td>';
        $tableConfirm .= '<td><a href="index.php?operation=ReadUsers">No</a></td>';
        $tableConfirm .= '</tr>';
        $tableConfirm .= '</table>';
        $header->Show();
        echo $tableConfirm;
        $footer->Show();
    }
}
