<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it for security
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'N/A';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'N/A';
    $number = isset($_POST['number']) ? htmlspecialchars($_POST['number']) : 'N/A';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : 'N/A';
    
    // The file to which the message will be saved
    $file = 'messages.txt';
    
    // The formatted message
    $data = "--- New Message ---\n" .
            "Name: " . $name . "\n" .
            "Email: " . $email . "\n" .
            "Number: " . $number . "\n" .
            "Message: " . $message . "\n" .
            "Date/Time: " . date('Y-m-d H:i:s') . "\n" .
            "---------------------\n\n";
            
    // Append the message to the file
    // FILE_APPEND ensures new data is added to the end of the file
    // LOCK_EX prevents multiple writes at the same time
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        // Redirect to a success page or back to the form with a success message
        header("Location: index.html?status=success#contact");
    } else {
        // Redirect back with an error message
        header("Location: index.html?status=error#contact");
    }
} else {
    // If someone tries to access this file directly, redirect them to the home page
    header("Location: index.html");
}
?>