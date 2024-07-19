<?php
// Database connection settings
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$reservationDate = $_POST['reservation-date'];
$reservationTime = $_POST['reservation-time'];
$numberOfPersons = $_POST['number-of-persons'];
$notes = $_POST['notes'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO reservations (first_name, last_name, email, phone, reservation_date, reservation_time, number_of_persons, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $firstName, $lastName, $email, $phone, $reservationDate, $reservationTime, $numberOfPersons, $notes);

// Execute the query
if ($stmt->execute()) {
    echo "Reservation submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
