<?PHP

$SenderEmail = $_POST[SenderEmail];
$linkToShare = $_POST[linkToShare];
$RecipientEmail = $_POST[RecipientEmail];
$to = $RecipientEmail;

$subject = $SenderEmail . " would like to share this page with you";

$message = "Hi,\n" . $SenderEmail;
$message .= " would like to share this page with you. \nCheck it out: " . $linkToShare;
$message .= "\n\n--------------------------------------------------------------";
$message .= "\nCheers,";
$message .= "\nhttp://www.therootout.com";

$headers = "From: do-not-reply@therootout.com";
$headers .= "\nReply-To: do-not-reply@therootout.com";
$headers .= "\nX-Mailer: therootout.com";

$sentOk = mail($to,$subject,$message,$headers);

echo "sentOk=" . $sentOk;

?>