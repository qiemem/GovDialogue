<?php

require_once("commentmanagement.php");

if(isset($_GET['attribute']) and isset($_GET['commentid'])){
    $commentid = $_GET['commentid'];
    switch($_GET['attribute']) {
    case "insightful":
        echo up_vote_insightful($commentid);
        break;
    case "offtopic":
        echo up_vote_off_topic($commentid);
        break;
    case "abusive":
        echo up_vote_abusive($commentid);
        break;
    default:
        echo -1;
        break;
    }
 }
?>