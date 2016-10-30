<?php

namespace JCVillegas\DevProject;

class ViewUserHeader
{
    public function show()
    {
        $header = '<html>';
        $header .= '<header>';
        $header .= '<title>';
        $header .= 'FormStack Dev Test';
        $header .= '</title>';
        $header .= '</header>';
        $header .= '<body>';

        echo $header;
    }
}
