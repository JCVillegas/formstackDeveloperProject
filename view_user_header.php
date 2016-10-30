<?php

namespace JCVillegas\DevProject;

/**
*   @ View html header class
*/
class ViewUserHeader
{
    /**
     * Shows header
     */
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
