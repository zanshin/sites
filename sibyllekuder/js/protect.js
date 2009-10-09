/*
	rudimentary password protection script to limit access to a web page
*/
/*
var password;
var pass1="cool";
password=prompt('Elfenbein Klaviermusik respects your privacy and therefore information regarding schedules is now protected. Please enter your password to view this page:',' ');
if (password==pass1)
  windows.location="http://www.sibyllekuder.com/calendar.php";
else
   {
    window.location="http://www.sibyllekuder.com";
    }
*/
var pass1="piano"
function pasuser(form) {
	if (this.document.login.password.value==pass1)             
		top.location.href="http://www.sibyllekuder.com/calendar.php"; 
	else 
	   {
	    location.href="http://www.sibyllekuder.com";
	    }
