<?php
// Establish a database connection (modify with your database credentials)
$servername = "localhost:3307"; // Your MySQL server address and port
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "data2"; // Your MySQL database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data from a POST request
$name = $conn->real_escape_string($_POST['name']);
$password = $conn->real_escape_string($_POST['password']);

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the "signup" table
$sql = "INSERT INTO signup (name, password) VALUES ('$name', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Sign-in Successful Bro!";
    // Redirect to a success page or take other actions
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
