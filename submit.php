<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer Autoload
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedLawyer = $_POST['lawyer_reaching'];
    $yourEmail = 'nxtjenanswering@gmail.com'; // Replace with your Gmail email address
    $yourPassword = 'zcyb qznh izpa gupu';     // Replace with your Gmail password

    $to = $selectedLawyer;
    $cc = $yourEmail;
    $subject = "New Legal Consultation Form Submission";
    
    $message = "Name: {$_POST['name']}\n";
    // Include other form data in the email body

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output (set to 2 for detailed debug)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $yourEmail;
        $mail->Password = $yourPassword;
        $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl'
        $mail->Port = 587;         // Set the appropriate port: 587 for TLS, 465 for SSL

        //Recipients
        $mail->setFrom($yourEmail);
        $mail->addAddress($to);
        $mail->addCC($cc);

        // Content
        $mail->isHTML(false); // Set to true if you're sending HTML content
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        header("Location: thank-you.html");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
