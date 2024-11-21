<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Define the recipient email address (where the email will be sent)
    $to = "deelaal@deelaalgoatskin.com"; // Replace with your email address

    // Define the email subject
    $email_subject = "Contact Form: " . $subject;

    // Create the email body
    $email_body = "
    <html>
    <head>
        <title>Contact Form Submission</title>
    </head>
    <body>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";

    // Define the email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n"; // Sender's email
    $headers .= "Reply-To: $email" . "\r\n"; // Reply-to email

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a "Thank You" page (optional)
        header('Location: thank_you.html'); // Make sure this page exists
        exit();
    } else {
        // Display an error message if the email fails to send
        echo "Message sending failed. Please try again.";
    }
}
?>
