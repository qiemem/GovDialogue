<?php

function write_errors($error_array) {
    echo "<ul class=\"errorMessages\">\n";
    foreach($error_array as $i => $msg) {
        echo "<li class=\"errorMessageContent\" id=\"$i\">$msg</li>\n";
    }
    echo "</ul>";
}
?>