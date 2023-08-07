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
$name = 'name'; // Replace with the actual name of the service provider
$profile_picture = 'profile_picture'; // Replace with the actual path to the profile picture
$rating = 'rating'; // Replace with the actual rating
$reviews = 'reviews'; // Replace with the actual number of reviews

// Create the insert query
$insert_query = "INSERT INTO serviceproviders (name, profile_picture, rating, reviews) 
                VALUES ('$name', '$profile_picture', '$rating', '$reviews')";

// Execute the query and check for errors
if ($connection->query($insert_query) === TRUE) {
    $last_inserted_id = $connection->insert_id;
    echo "New service provider added successfully. Provider ID: $last_inserted_id";
} else {
    echo "Error: " . $insert_query . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>
