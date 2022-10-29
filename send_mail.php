<?php
if(isset($_POST['email'])) {
// EDIT THE 2 LINES BELOW AS REQUIRED
$email_to = "nsscellchennai@gmail.com";
$email_subject = "Feedback from visitor of NSS !... ";
 
function died($error) {
// your error code can go here
echo "We are very sorry, but there were error(s) found with the form you submitted. ";
echo "These errors appear below.<br /><br />";
echo $error."<br /><br />";
echo "Please go back and fix these errors.<br /><br />";
die();
}
 
// validation expected data exists
if(!isset($_POST['fullname']) ||
!isset($_POST['email']) ||
!isset($_POST['mobile']) ||
!isset($_POST['city']) ||
!isset($_POST['message'])) {
died('We are sorry, but there appears to be a problem with the form you submitted.');
}
$fullname = $_POST['fullname']; // required
$email_from = $_POST['email']; // required
$mobile = $_POST['mobile']; // not required
$city = $_POST['city']; // not required
$message = $_POST['message']; // required
 
$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if(!preg_match($email_exp,$email_from)) {
$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
}
$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$fullname)) {
$error_message .= 'Please enter your full name.<br />';
}
 
if(strlen($message) < 2) {
$error_message .= 'Message box can not be empty.<br />';
}
if(strlen($error_message) > 0) {
died($error_message);
}
$email_message = "Contact Form details are below.\n\n";
 
function clean_string($string) {
$bad = array("content-type","bcc:","to:","cc:","href");
return str_replace($bad,"",$string);
}
 
$email_message .= "Full Name: ".clean_string($fullname)."\n";
$email_message .= "Email Add.: ".clean_string($email_from)."\n";
$email_message .= "Mobile No.: ".clean_string($mobile)."\n";
$email_message .= "City: ".clean_string($city)."\n";
$email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); ?>
 
Thank you for contacting us. We will get back to you Soon.
<a href="javascript:history.go(-1)" title="Go Back">Go Back</a>
<?php
}
?>