<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Function to extract lawyer's name and email from the selected option
function extractLawyerInfo($selectedOption) {
    // Adjust this regex pattern based on the actual format of your dropdown options
    preg_match('/(.+) \((.+)\)/', $selectedOption, $matches);

    if ($matches && count($matches) === 3) {
        return array('name' => $matches[1], 'email' => $matches[2]);
    }

    return null;
}

// Assuming the lawyer reaching option is submitted through a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected lawyer reaching option from the form submission
    $selectedLawyerOption = $_POST['lawyer_reaching'];

    // Extract lawyer's name and email from the selected option
    $lawyerInfo = extractLawyerInfo($selectedLawyerOption);

    if ($lawyerInfo) {
        try {
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            // Set mailer to use SMTP
            $mail->isSMTP();
            
            // Specify the SMTP server
            $mail->Host = 'smtp.gmail.com';

            // Enable SMTP debugging
            // $mail->SMTPDebug = 2; // Uncomment this line for debugging purposes
            
            // Set SMTP authentication
            $mail->SMTPAuth = true;
            
            // Specify the SMTP username
            $mail->Username = 'nxtjenanswering@gmail.com';
            
            // Specify the SMTP password
            $mail->Password = 'April16$1987!';
            
            // Enable TLS encryption; `PHPMailer::ENCRYPTION_STARTTLS` also accepted
            $mail->SMTPSecure = 'tls';
            
            // Set the SMTP port
            $mail->Port = 587;

            // Set sender and recipient information
            $mail->setFrom('nxtjenanswering@gmail.com', 'Your Name');
            $mail->addAddress($lawyerInfo['email'], $lawyerInfo['name']);

            // Set email subject and body
            $mail->Subject = 'Test Subject';
            $mail->Body    = 'This is a test email from PHPMailer.';

            // Send the email
            $mail->send();

            echo 'Email has been sent successfully';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Error: Unable to extract lawyer information from the selected option';
    }
}
?>
