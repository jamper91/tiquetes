<?php
    header('Content-Disposition: attachment; filename="mypdf-'.date("n-d-Y").'.pdf"');
    echo $content_for_layout;

?>