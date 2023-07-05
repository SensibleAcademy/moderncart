<?php
// Start a session to store user login status
session_start();

// Replace these with your actual database credentials
$host = 'your_database_host';
$username = 'your_database_username';
$password = 'your_database_password';
$database = 'your_database_name';

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate user credentials
function validateUser($username, $password, $conn) {
    // Sanitize user input to prevent SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // User exists and the credentials are correct
        return true;
    } else {
        // User doesn't exist or the credentials are incorrect
        return false;
    }
}

// If the login form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the user
    if (validateUser($username, $password, $conn)) {
        // Set session variables to mark the user as logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redirect to a secure page after successful login
        header('Location: secure_page.php');
        exit;
    } else {
        // Invalid login, show an error message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
