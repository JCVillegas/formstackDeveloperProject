<?php

namespace JCVillegas\DevProject;

/**
*   @ View generic messages class
*/
class ViewUserMessage
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
     * @param  string $message
     * @return void
     */
    public function show($message)
    {

        $this->header->show();
        echo $message;
        echo "<br><a href='index.php?operation=ReadUsers'>Continue to list users</a>";
        $this->footer->show();
    }
}
