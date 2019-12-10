<?php
require 'PHPMailerAutoload.php';
DEFINE("BASE_URL", "localhost:8080/GradeCity-master/");
DEFINE("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
$mail = new PHPMailer;
// Database Connection
$dbhostname = "127.0.0.1";
$dbname = "kashicom_gradecity";
$username = "kashicom_root";
$password = "Mikkynoble@1";
$conn = new mysqli($dbhostname, $username, $password, $dbname);
//Report error
if(mysqli_connect_errno()) {
    echo "Connection to database failed: %s\n", mysqli_connect_error();
}

//Form data
$email = $_POST['reset_password_email'];

// Create tokens
try {
    $selector = bin2hex(random_bytes(10));
} catch (Exception $e) {
}

$url = sprintf('%spassword-reset-process.php?%s', BASE_URL, http_build_query([
    'selector' => $selector
]));

// Token expiration
$expires = new DateTime('NOW');
try {
    $expires->add(new DateInterval('PT01H'));
} catch (Exception $e) {
} // 1 hour
$expires = $expires->format('U');

// Check entered email on the database
$conn->query("SELECT email FROM users WHERE email = '$email'");
$affRows = $conn->affected_rows;
if($affRows > 0 ) {
// Delete any existing tokens for this user
    $conn->query("DELETE FROM password_reset WHERE reset_email = '$email'");

// Insert reset token into database
    $conn->query("INSERT INTO password_reset(reset_email, reset_key, expires) VALUES('$email', '$selector', '$expires')");

// Subject
    $subject = 'Your password reset link';
// Message
    $message = '<p>We received a password reset request. The link to reset your password is below. ';
    $message .= 'If you did not make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password reset link:</br>';
    $message .= sprintf('<a href="%s">%s</a></p>', $url, $url);
    $message .= '<p>Thanks!</p>';
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

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    try {
        if (!$mail->send()) {
            echo '<div class="alert alert-danger" role="alert" style="width: 100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> Sorry request could not be processed.</strong></div>';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '<div class="alert alert-success" role="alert" style="width: 100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>A reset link has been sent to your email address.</strong></div>';
        }
    } catch (phpmailerException $e) {
    }
} else {
    echo '<div class="alert alert-danger" role="alert" style="width: 100%"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> Sorry, email does not exist.</strong></div>';
}