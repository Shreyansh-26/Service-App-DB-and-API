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
$service_id = 'service_id'; // Replace with the actual service ID
$title = 'title'; // Replace with the actual title of the service
$price = 'price'; // Replace with the actual price of the service
$duration = 'duration'; // Replace with the actual duration of the service
$availability = 'availability'; // Replace with the actual availability information
$prerequisites = 'prerequisites'; // Replace with the actual prerequisites
$required_material = 'required_material'; // Replace with the actual required materials
$terms_and_conditions = 'terms and conditions'; // Replace with the actual terms and conditions

// Create the insert query
$insert_query = "INSERT INTO services (service_id, title, price, duration, availability, prerequisites, required_material, `terms and conditions`) 
                VALUES ('$service_id', '$title', '$price', '$duration', '$availability', '$prerequisites', '$required_material', '$terms_and_conditions')";

// Execute the query and check for errors
if ($connection->query($insert_query) === TRUE) {
    echo "New service added successfully. Service ID: $service_id";
} else {
    echo "Error: " . $insert_query . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>
