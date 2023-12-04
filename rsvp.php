<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rsvp_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $attendance = htmlspecialchars($_POST["attending"]);
    $guests = htmlspecialchars($_POST["guests"]);

    // Insert data into the database
    $sql = "INSERT INTO rsvp (name, email, attending, guests) VALUES ('$name', '$email', '$attending', '$guests')";

    if ($conn->query($sql) === TRUE) {
        echo "RSVP successfully recorded";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect users who try to access the script directly
    header("Location: index.html");
    exit();
}
?>
