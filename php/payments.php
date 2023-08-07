<?php
// Replace these variables with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'swift serve';

// Create a connection to the database
$connection = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Prepare data for the insert query (replace the values with actual data)
$booking_id = 'booking_id'; // Replace with the actual booking ID to which the payment belongs
$amount = 'amount'; // Replace with the actual payment amount
$payment_method = 'payment_method'; // Replace with the actual payment method

// Create the insert query
$insert_query = "INSERT INTO payments (booking_id, amount, payment_method) 
                VALUES ('$booking_id', '$amount', '$payment_method')";

// Execute the query and check for errors
if ($connection->query($insert_query) === TRUE) {
    $last_inserted_id = $connection->insert_id;
    echo "New payment recorded successfully. Payment ID: $last_inserted_id";
} else {
    echo "Error: " . $insert_query . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>
