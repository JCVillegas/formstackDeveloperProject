<?php

namespace JCVillegas\DevProject;

class ViewUserDelete
{
    public function show($id)
    {
        $header = new ViewUserHeader();
        $footer = new ViewUserFooter();

        $tableConfirm = '<table border=1>';
        $tableConfirm .= '<tr>';
        $tableConfirm .= '<td colspan=2>Confirm delete User</td>';
        $tableConfirm .= '</tr>';
        $tableConfirm .= '<tr>';
        $tableConfirm .= '<td><a href="index.php?operation=DeleteUser&id='.urlencode($id['id']).'">Yes</a></td>';
        $tableConfirm .= '<td><a href="index.php?operation=ReadUsers">No</a></td>';
        $tableConfirm .= '</tr>';
        $tableConfirm .= '</table>';
        $header->show();
        echo $tableConfirm;
        $footer->show();
    }
}
