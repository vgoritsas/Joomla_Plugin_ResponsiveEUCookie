/* ======================================================
# Module EU Cookies - Joomla! Module (Pro version)
# -------------------------------------------------------
# For Joomla! 3.x
# Copyright (©) 2015 vgoritsas.com. All rights reserved.
# License: GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html
# Website: http://www.vgoritsas.com
# Support: support@vgoritsas.com
========================================================= */


/*jQuery(document).ready(function(){ 
 if (cookieExists()) { 
document.getElementById("cookie-alert").style.display = 'none';
 } else {
 fadeIn(document.getElementById("cookie-alert")); } 
});*/



if (cookieExists()) {
	document.getElementById("cookie-alert").style.display = 'none';
} else {
	fadeIn(document.getElementById("cookie-alert"));
}

function addCookie() {
	var curDate = new Date();
	curDate.setTime(curDate.getTime() + (24 * 60) * 365);
	document.cookie = "cookieTermsAccepted=1; expires=" + curDate.toUTCString();
	fadeOut(document.getElementById("cookie-alert"));
}

function cookieExists() {
	var cookies = document.cookie.split(';');
	for(var i=0; i < cookies.length; i++) {
		if (cookies[i] == "cookieTermsAccepted=1") {
			return true;
		}
	}
	return false;
}

function fadeOut(element) {
    var op = 1;
    var timer = setInterval(function () {
        if (op <= 0.15){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.15;
    }, 50);
}

function fadeIn(element) {
    var op = 0.09;
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.15;
    }, 25);
}
