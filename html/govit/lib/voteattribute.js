function getXMLHttpRequest() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // for Firefox, Chrome, Opera, Safari, and IE7+ I guess.
        xmlhttp = new XMLHttpRequest();
    } else if(window.ActiveXObject) {
        // for IE6 and IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}
function upVoteAttribute(commentID, attribute) {
    var xmlhttp = getXMLHttp();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readState==4) {
            document.getElementById(attribute+commentID).innerHTML=xmlhttp.responseText;
        }
    }
    var url = "upvote.php?commentid="+commentID+"&attribute="+attribute;
    xmlhttp.open("GET",url,true);
    xmlhttp.send(null);
}
