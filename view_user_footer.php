<?php

namespace JCVillegas\DevProject;

/**
*   @ View html footer class
*/
class ViewUserFooter
{
    /**
     * Shows footer
     */
    public function show()
    {
        $footer= '</body>';
        $footer.= '</html>';

        echo $footer;
    }
}
