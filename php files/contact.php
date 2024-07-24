<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $terms = isset($_POST["terms"]);

    // Validate form data
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (!$terms) {
        $errors[] = "You must accept the terms of service.";
    }

    // If there are validation errors, show them
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        exit;
    }

    // Email configuration
    $to = "natuabrahm1@gmail.com"; // Replace with your email address
    $subject = "Contact Form Submission from $name";
    $emailContent = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $emailContent, $headers)) {
        echo "Thank you for contacting us, $name. We will get back to you soon.";
    } else {
        echo "Sorry, something went wrong and we couldn't send your message.";
    }
} else {
    echo "Invalid request.";
}
?>
