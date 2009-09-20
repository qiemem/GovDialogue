// global.js

// Toggle wrapper
function toggleVisibility(commentID)
{
	toggleLayerVisibility("comment" + commentID + "replies");
	toggleLayerVisibilityInline("comment" + commentID + "hidereplies");
	toggleLayerVisibilityInline("comment" + commentID + "showreplies");
}

// Toggle element visibility
function toggleLayerVisibility(layerID)
{
	var element, visible;
	if (document.getElementById) { element = document.getElementById(layerID); } // standards compliant
	else if (document.all) { element = document.all[layerID]; } // old MSIE
	else if (document.layers) { element = document.layers[layerID]; } // NN4
	visible = element.style;
	if (visible.display == "" && element.offsetWidth != undefined && element.offsetHeight != undefined)
	{
		visible.display = (element.offsetWidth != 0 && element.offsetHeight != 0) ? "block" : "none";
	}
	visible.display = (visible.display == "" || visible.display == "block") ? "none" : "block";
}

// Also toggles the visibility of an element--however, this function preserves formatting for inline elements
function toggleLayerVisibilityInline(layerID)
{
	var element, visible;
	if (document.getElementById) { element = document.getElementById(layerID); } // standards compliant
	else if (document.all) { element = document.all[layerID]; } // old MSIE
	else if (document.layers) { element = document.layers[layerID]; } // NN4
	visible = element.style;
	if (visible.display == "" && element.offsetWidth != undefined && element.offsetHeight != undefined)
	{
		visible.display = (element.offsetWidth != 0 && element.offsetHeight != 0) ? "inline" : "none";
	}
	visible.display = (visible.display == "" || visible.display == "inline") ? "none" : "inline";
}