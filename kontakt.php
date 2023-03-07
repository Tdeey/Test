<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and sanitize the input data
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);

    // Set the recipient email address
    $to = "youremail@example.com";

    // Set the email subject
    $subject = "New message from $name";

    // Set the email message
    $message_body = "Name: $name\n\nEmail: $email\n\nMessage: $message";

    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Send the email
    if (mail($to, $subject, $message_body, $headers)) {
        // If the email was sent successfully, display a thank you message
        echo '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Thank You</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    font-size: 16px;
                    line-height: 1.5;
                    color: #333;
                    background-color: #f9f9f9;
                }

                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }

                h1 {
                    font-size: 36px;
                    margin-bottom: 20px;
                }

                p {
                    margin-bottom: 20px;
                }

                a {
                    color: #337ab7;
                    text-decoration: none;
                }

                a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Thank You!</h1>
                <p>Your message has been sent successfully.</p>
                <p><a href="index.html">Return to contact page</a></p>
            </div>
        </body>
        </html>';
        exit;
    } else {
        // If there was an error sending the email, display an error message
        $error_message = "Sorry, there was an error sending your message. Please try again later.";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
