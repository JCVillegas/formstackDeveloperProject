<?php


class view_user_header
{
    public function Show()
    {
        $header = '<html>';
        $header .= '<header>';
        $header .= '<title>';
        $header .= 'FormStack Dev Test';
        $header .= '</title>';
        $header .= '</header>';
        $header .= '<body>';

        return $header;
    }
}
