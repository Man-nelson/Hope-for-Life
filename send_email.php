<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Invalid email format.</div>';
        exit;
    }

    // Set the email recipient
    $to = "info@hopeforlifejesusministry.org"; // Replace with your email
    $subject = "Contact Form Message: " . $subject;
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo '<div class="alert alert-success">Your message has been sent successfully.</div>';
    } else {
        echo '<div class="alert alert-danger">There was an error sending your message. Please try again later.</div>';
    }
} else {
    echo '<div class="alert alert-danger">Invalid request.</div>';
}
