<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "school";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO userdata (name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['sign-in'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: home.html");
        echo "Sign in successful";
        // Add any additional actions you want to perform upon successful sign-in.
    } else {
        echo "Wrong input, please try again ";
    }
}

$conn->close();
?>
