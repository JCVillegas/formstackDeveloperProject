<?php


class view_user_message
{
    public function Show($message)
    {
        $header = new view_user_header();
        $footer = new view_user_footer();

        $header->Show();
        echo $message;
        echo "<br><a href='index.php?operation=ReadUsers'>Continue to list users</a>";
        $footer->Show();
    }
}
