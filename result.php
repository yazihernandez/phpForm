<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session

$name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous"> 

    <!-- CSS styling -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="back">
        <div class="results">
            <h1>Form Results</h1>
            <p>Name:<?php echo htmlspecialchars($name); ?></p>
            <p>Email:<?php echo htmlspecialchars($email); ?></p>
            <p>Message:<?php echo htmlspecialchars($message); ?></p>
            <a href="http://localhost:8888/" class="btn btn-secondary">Go Back</a>
        </div>
    </div>


</body>
</html>
