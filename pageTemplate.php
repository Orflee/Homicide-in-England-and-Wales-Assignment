<?php
    function render($pageContent) {
        include("header.php");
        include("navbar.php");
        include("footer.php");
        $header = pageHeader();
        $navbar = navbar();
        $footer = footer();
        echo '<!DOCTYPE html>
        <html>'.
            $header.
        '<body>'.
                $navbar.
                $pageContent.
                $footer.
            '</body>	
        </html>';
    }