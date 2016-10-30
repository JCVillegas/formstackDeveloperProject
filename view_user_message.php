<?php

namespace JCVillegas\DevProject;

/**
*   @ View generic messages class
*/
class ViewUserMessage
{
    /**
     * @param  string $message
     * @return void
     */
    public function show($message)
    {
        $header = new ViewUserHeader();
        $footer = new ViewUserFooter();

        $header->show();
        echo $message;
        echo "<br><a href='index.php?operation=ReadUsers'>Continue to list users</a>";
        $footer->show();
    }
}
