<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $lawyerReaching = $_POST["lawyer_reaching"];
    $hearAboutUs = $_POST["hear_about_us"];
    $legalPlan = $_POST["legal_plan_name&Id"];
    $metlifeId = $_POST["metlife_id"];
    $accidentType = $_POST["accident_type"];
    $accidentDate = $_POST["accident_date"];
    $accidentLocation = $_POST["accident_location"];
    $hospitalization = $_POST["hospitalization"];

    // Send email to the selected lawyer
    $to = $lawyerReaching;
    $subject = "New Legal Consultation Form Submission";

    $message = "Name: $name\n";
    $message .= "Phone Number: $phone\n";
    $message .= "Email: $email\n";
    $message .= "Lawyer Reaching: $lawyerReaching\n";
    $message .= "How did you hear about us?: $hearAboutUs\n";
    $message .= "Legal Plan Name&ID: $legalPlanName&Id\n";
    $message .= "Type of Accident: $accidentType\n";
    $message .= "Date of Accident: $accidentDate\n";
    $message .= "Location of Accident: $accidentLocation\n";
    $message .= "Hospitalization or Treatment Received: $hospitalization\n";

    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    mail($to, $subject, $message, $headers);

    // Redirect to a thank-you page or display a thank-you message
    header("Location: thank-you.html");
    exit();
}
?>