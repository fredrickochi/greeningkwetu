<?php
/**
 * PHP Email Form configuration file
 * For use with the "PHP Email Form" plugin by BootstrapMade.com
 */

// Replace with your real receiving email address
$receiving_email_address = 'info@greeningkwetu.org';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Send email
    $to = $receiving_email_address;
    $subject = "New message from $name: $subject";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo json_encode(['success' => true]);
    } else {
        // Error sending email
        echo json_encode(['error' => 'Failed to send email']);
    }
} else {
    // Not a POST request, redirect to the contact form
    header('Location: ../index.html#contact');
    exit;
}

?>