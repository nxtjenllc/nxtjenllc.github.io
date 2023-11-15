<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include your mail function here to send emails to the selected lawyer and CC to yourself
        $selectedLawyer = $_POST['lawyer_reaching'];
        $yourEmail = 'nxtjenanswering@gmail.com';

        $to = $selectedLawyer;
        $cc = $yourEmail;
        $subject = "New Legal Consultation Form Submission";
        
        // Include the form data in the email body
        $message = "Name: {$_POST['name']}\n";
        $message .= "Phone Number: {$_POST['phone']}\n";
        $message .= "Email: {$_POST['email']}\n";
        $message .= "Lawyer Reaching: {$_POST['lawyer_reaching']}\n";
        $message .= "How did you hear about us?: {$_POST['hear_about_us']}\n";
        $message .= "Legal Plan Name&ID: {$_POST['legal_plan_name_&_id']}\n";
        $message .= "Type of Accident: {$_POST['accident_type']}\n";
        $message .= "Date of Accident: {$_POST['accident_date']}\n";
        $message .= "Location of Accident: {$_POST['accident_location']}\n";
        $message .= "Hospitalization or Treatment Received: {$_POST['hospitalization']}\n";
        $message .= "Message: {$_POST['Message']}\n";
