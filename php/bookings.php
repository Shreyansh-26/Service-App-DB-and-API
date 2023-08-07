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
$user_id = 'user_id';
$service_id = 'service_id';
$date = 'date';
$time = 'time';

// Create the insert query
$insert_query = "INSERT INTO bookings (user_id, service_id, date, time) 
                VALUES ('$user_id', '$service_id', '$date', '$time')";

// Execute the query and check for errors
if ($connection->query($insert_query) === TRUE) {
    $last_inserted_id = $connection->insert_id;
    echo "New booking created successfully. Booking ID: $last_inserted_id";
} else {
    echo "Error: " . $insert_query . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>
