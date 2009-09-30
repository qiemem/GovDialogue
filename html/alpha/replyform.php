<?php

// replyform.php

require_once("header.php");
printHeader("Title", "Keywords", "Description");

?>

<form name="replyForm" action="reply.php" method="POST">

	<input type="hidden" name="parentNode" value="11111111111111" />
    <input type="hidden" name="replyType" value="POST OR COMMENT" />
	
	<p>
    	<textarea rows="10" cols="30" name="replyText" id="replytext"></textarea>
    </p>
    
    <p>
    	<input type="submit" value="Reply" />
    </p>

</form>

<?php

require_once("footer.php");

?>