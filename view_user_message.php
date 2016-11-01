<?php

namespace JCVillegas\DevProject;

/**
*   @ View generic messages class
*/
class ViewUserMessage
{
    
    private $viewHeader;
    private $footer;

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
     * @param  string $message
     * @return void
     */
    public function show($message)
    {

        $this->viewHeader->show();
        echo $message;
        echo "<br><a href='index.php?operation=ReadUsers'>Continue to list users</a>";
        $this->viewFooter->show();
    }
}
