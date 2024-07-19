<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $firstName = htmlspecialchars($_POST['first-name']);
    $lastName = htmlspecialchars($_POST['last-name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $reservationDate = htmlspecialchars($_POST['reservation-date']);
    $reservationTime = htmlspecialchars($_POST['reservation-time']);
    $numberOfPersons = htmlspecialchars($_POST['number-of-persons']);
    $notes = htmlspecialchars($_POST['notes']);
    
    // Display the submitted data
    echo "<h2>Reservation Details:</h2>";
    echo "<p><strong>Name:</strong> $firstName $lastName</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Reservation Date:</strong> $reservationDate</p>";
    echo "<p><strong>Reservation Time:</strong> $reservationTime</p>";
    echo "<p><strong>Number of Persons:</strong> $numberOfPersons</p>";
    echo "<p><strong>Notes:</strong> $notes</p>";
} else {
    echo "<p>Form submission error: Form was not submitted.</p>";
}
?>
