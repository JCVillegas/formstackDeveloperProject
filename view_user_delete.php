<?php

namespace JCVillegas\DevProject;

/**
*   @ View confirmation class to delete user
*/
class ViewUserDelete
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
            
        $this->viewHeader=$viewHeader;
        $this->viewFooter=$viewFooter;

    }

    /**
     * Shows Header, confirmation and footer
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        
        $tableConfirm = '<table border=1>';
        $tableConfirm .= '<tr>';
        $tableConfirm .= '<td colspan=2>Confirm delete User</td>';
        $tableConfirm .= '</tr>';
        $tableConfirm .= '<tr>';
        $tableConfirm .= '<td><a href="index.php?operation=DeleteUser&id='.urlencode($id['id']).'">Yes</a></td>';
        $tableConfirm .= '<td><a href="index.php?operation=ReadUsers">No</a></td>';
        $tableConfirm .= '</tr>';
        $tableConfirm .= '</table>';
        $this->viewHeader->show();
        echo $tableConfirm;
        $this->viewFooter->show();
    }
}
