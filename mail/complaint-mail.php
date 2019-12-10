<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

//sumbission data
$ipaddress = $_SERVER['REMOTE_ADDR'];
$date = date('d/m/Y');
$time = date('H:i:s');

//form data
$name = $_POST['complaintName'];
$email = $_POST['conEmail'];
$subject = $_POST['complaintSubject'];
$message = $_POST['complaintTextarea'];
$setFromEmail = 'service@mainstride.com';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'server270.web-hosting.com';  // Specify main and backup SMTP servers
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username = 'service@mainstride.com';                 // SMTP username
 $mail->Password = 'Password123*';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 465;                                    // TCP port to connect to
try {
    $mail->setFrom($setFromEmail);
} catch (phpmailerException $e) {
}
$mail->addAddress('gabrielilo190@gmail.com'/*, ''*/);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($email);
$mail->addCC('');
$mail->addBCC('');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'New email from GradeCity';
$mail->Body    = "<p>You have recieved a new message from the complaint form on your website.</p>
						  <p><strong>Name: </strong> {$name} </p>
						  <p><strong>Email Address: </strong> {$email} </p>
						  <p><strong>Subject: </strong> {$subject} </p>
						  <p><strong>Message: </strong> {$message} </p>
						  <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
try {
    if (!$mail->send()) {
        echo '<div class="alert alert-danger" role="alert" style="width: 100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> Sorry your message could not be sent.</strong></div>';
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo '<div class="alert alert-success" role="alert" style="width: 100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Thanks for your message. We\'ll be in touch.</strong></div>';
    }
} catch (phpmailerException $e) {
}