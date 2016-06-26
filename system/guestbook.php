

<?php

$Submit 	= $_POST["Submit"];

$Name 		= $_POST["Name"];
$Email 		= $_POST["Email"];
$Website 	= $_POST["Website"];
$Comments	= $_POST["Comments"];
$NumLow 	= $_REQUEST["NumLow"];
$NumHigh 	= $_REQUEST["NumHigh"];




$Email 		= ereg_replace("[^A-Za-z0-9 \@\.\-\/\'_\~\:]", "", $Email);
$Comments	= ereg_replace("/", "", $Comments);
$Comments	= ereg_replace("<", "", $Comments);
$Comments	= ereg_replace(">", "", $Comments);
$Website 	= eregi_replace("http://", "", $Website);
$Website	= ereg_replace("[^A-Za-z0-9 \@\.\-\/\'_\~\:]", "", $Website);

$Name 		= stripslashes($Name);
$Email 		= stripslashes($Email);
$Website 	= stripslashes($Website);
$Comments	= stripslashes($Comments);


if ($Email  == "") 
{
	$Email  = "no e-mail";
}
if ($Website == "") 
{
	$Website = "unknown location";
}

if ($Submit == "Yes") {
	
	

$to = "rootout@gmail.com";
$subject = "Comment from therootout.com";
$message = "Name: " . $Name;
$message .= "\nEmail: " . $Email;
$message .= "\nWebsite: " . $Website;
$message .= "\n\nComment:\n" . $Comments;
$headers = "From: do-not-reply@therootout.com";
$headers .= "\nReply-To: do-not-reply@therootout.com";
$headers .= "\nX-Mailer: therootout.com";

$sentOk = mail($to,$subject,$message,$headers);


	
	
	$filename 	= "guestbook.txt";
	$fp 		= fopen( $filename,"r"); 
	$OldData 	= fread($fp, 80000); 
	fclose( $fp ); 

	$Today 		= (date ("l dS F Y (h:i:s A)",time()));
	

	$Input 		= "<a href=\"mailto:$Email\"><font color=\"#29ABE2\">$Name</font></a><font color=\"#B3B3B3\"> from </font><font color=\"#DADADA\"><u><a href=\"http://$Website\" target=\"_blank\">$Website</a></u></font><font color=\"#DADADA\"> says:</font><br>$Comments<br><font color=\"#B3B3B3\">Posted on: $Today</font><br><br>.:::.";


	$New 		= "$Input$OldData";


	$fp 		= fopen( $filename,"w"); 
	if(!$fp) die("&GuestBook=Cannot Write $filename ......&");
	fwrite($fp, $New, 800000); 
	fclose( $fp ); 
}


	$filename 	= "guestbook.txt";
	$fp 		= fopen( $filename,"r"); 
	$Data 		= fread($fp, 800000); 
	fclose( $fp );
	$DataArray 	= split (".:::.", $Data);
	$NumEntries 	= count($DataArray) - 1;
	print "&TotalEntries=$NumEntries&NumLow=$NumLow&NumHigh=$NumHigh&GuestBook=";
	for ($n 		= $NumLow; $n < $NumHigh; $n++) {
	print $DataArray[$n];
		if (!$DataArray[$n]) {
			Print "<br><br><b>No more comments.</b>";
		exit;
		}
	}
	
?>
