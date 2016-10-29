<?php


class ViewUserMessage
{
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
