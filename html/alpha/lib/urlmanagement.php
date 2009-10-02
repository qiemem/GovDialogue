<?php

function host(){
    return $_SERVER['HTTP_HOST'];
  }

function cur_directory() {
    return dirname($_SERVER['PHP_SELF']);
}

function protocol() {
    if($_SERVER['HTTPS']=='on') {
        return "https://";
    } else {
        return "http://";
    }
}

function get_absolute_url( $relative_url ) {
    if($relative_url{0} != DIRECTORY_SEPARATOR) {
        return protocol().host().cur_directory().DIRECTORY_SEPARATOR.$relative_url;
    } else {
        return protocol().host().$relative_url;
    }
}

function relative_redirect( $relative_url ) {
    header("Location: ".get_absolute_url($relative_url));
    exit;
}

?>