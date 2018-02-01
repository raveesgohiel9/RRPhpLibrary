<?php
	class RRFormExceptionHandling {
		
		
		function passwordValidation($password1) {
			if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password1)) {
				//return 'the password does not meet the requirements!';
			}
			else
			{
				//return "Password is strong";
			}
		}
	}
?>

<?php
$password1 = "";
//echo "Pass : ".$password1;
$pCrud = new RRFormExceptionHandling();
$abcd= $pCrud->passwordValidation($password1);
//echo "Abcd: ".$abcd;
?>