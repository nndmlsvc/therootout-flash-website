<?PHP

$to = "rootout@gmail.com";


$theName=$_POST[theName];
$theEmail=$_POST[theEmail];
$thePhone=$_POST[thePhone];
$theWebsite=$_POST[theWebsite];
$theMessage=$_POST[theMessage];


$subject = "Contact from therootout.com";

$message = "Name: " . $theName;
$message .= "\nEmail: " . $theEmail;
$message .= "\nPhone: " . $thePhone;
$message .= "\nWebsite: " . $theWebsite;
$message .= "\n\nMessage:\n" . $theMessage;
$headers = "From: do-not-reply@therootout.com";
$headers .= "\nReply-To: do-not-reply@therootout.com";
$headers .= "\nX-Mailer: therootout.com";

$sentOk = mail($to,$subject,$message,$headers);

echo "sentOk=" . $sentOk;

?>