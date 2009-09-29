<?php

require_once("commentmanagement.php");

if(isset($_GET['attribute']) and isset($_GET['commentid'])){
    $commentid = $_GET['commentid'];
    switch($_GET['attribute']) {
    case "insightful":
        up_vote_insightful($commentid);
        break;
    case "offtopic":
        up_vote_offtopic($commentid);
        break;
    case "abusive":
        up_vote_abusive($commentid);
        break;
    }
 }
?>