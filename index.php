<?php
session_start(); //start session to store results

//error checking
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';
include 'functions.php';

//initialize
$name = $email = $message = "";
$nameError = $emailError = $messageError = "";
$hasPost = false;

//check if the form has been submitted and validate data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasPost = true;
    
    if (empty($_POST['name'])) {
        $nameError = "Name is required.";
    } else {
        $name = validateData($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailError = "Email is required.";
    } else {
        $email = validateData($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format.";
        }
    }

    if (empty($_POST['message'])) {
        $messageError = "Message is required.";
    } else {
        $message = validateData($_POST['message']);
    }
    if (!$nameError && !$emailError && !$messageError) {
        // Store the form data in session variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['message'] = $message;
        
        header("Location: " . SITE_RESULT);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous"> 

    <!-- CSS styling -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Form with background and some styling -->
<div class="back">
    <div class="back-size">
        <form method="post" action="//<?php echo htmlspecialchars($_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']); ?>">
            <div class="form-floating mb-3">
                <h5>Name</h5>
                <input name="name" type="text" value="<?php echo htmlspecialchars($name); ?>" class="form-control" ><span style="color:red" class="error"> <?php echo $nameError; ?></span>
            </div>
            <div class="form-floating mb-3">
                <h5>Email</h5>
                <input name="email" type="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" ><span style="color:red" class="error"> <?php echo $emailError; ?></span>
            </div>
            <div class="form-floating mb-3">
                <h5>Message</h5>
                <textarea name="message" type="text" class="form-control" rows="3" ><?php echo htmlspecialchars($message); ?></textarea><span style="color:red" class="error"> <?php echo $messageError; ?></span>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
    <?php
    if($hasPost){
        if(empty($name) || empty($email) || empty($message)){
            echo "<p>Please enter a valid name, email & message.</p>";
        } else {
            echo "<h2>Result:</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Message: $message</p>";
        }
    }
    ?>

</body>
</html>