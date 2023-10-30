<?php
// Database connection parameters
$hostname = "localhost:3307";
$username = "root";
$password = "";
$database = "data2";


// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Initialize variables to store form data
    $firstname = $lastname = $phone = $country = $state1 = $Gender = $bike = "";

    // Check if form fields are set and not empty
    if (isset($_POST["firstname"]) && !empty($_POST["firstname"])) {
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    }
    if (isset($_POST["lastname"]) && !empty($_POST["lastname"])) {
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    }
    if (isset($_POST["phone"]) && !empty($_POST["phone"])) {
        $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    }
    if (isset($_POST["country"]) && !empty($_POST["country"])) {
        $country = mysqli_real_escape_string($conn, $_POST["country"]);
    }
    if (isset($_POST["state1"]) && !empty($_POST["state1"])) {
        $state1 = mysqli_real_escape_string($conn, $_POST["state1"]);
    }
    if (isset($_POST["Gender"]) && !empty($_POST["Gender"])) {
        $Gender = mysqli_real_escape_string($conn, $_POST["Gender"]);
    }
    if (isset($_POST["bike"]) && !empty($_POST["bike"])) {
        $bike = mysqli_real_escape_string($conn, $_POST["bike"]);
    }

    // Insert data into the database
    $sql = "INSERT INTO user_data (firstname, lastname, phone, country, state1, Gender, bike) 
            VALUES ('$firstname', '$lastname', '$phone', '$country', '$state1', '$Gender', '$bike')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
