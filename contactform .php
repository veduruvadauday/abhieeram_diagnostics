<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
//-----Contact form------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $contactname = $_POST['contactname'] ?? '';
    $contactemail = $_POST['contactemail'] ?? '';
    $contactsubject = $_POST['contactsubject'] ?? '';
    $contactmessage = $_POST['contactmessage'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'srimadhuraju@gmail.com'; // Your Gmail email address
        $mail->Password = 'umlpkduhhhajjahi'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('srimadhuraju@gmail.com', 'abhieeram_diagnostic'); // Your Gmail email and name
        $mail->addAddress('srimadhuraju@gmail.com', 'abhieeram_diagnostic'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from abhieeram_diagnostic';
        $mail->Body = "
            <h1>New Message</h1>
            <h1>Contact Details</h1>
            <p><strong>Name:</strong> $contactname</p>
            <p><strong>Email:</strong> $contactemail</p>
            <p><strong>Phone:</strong> $contactsubject</p>
            <p><strong>Message:</strong><br>$contactmessage</p>
        ";

        $mail->send();
       echo  "Your message has been sent. Thank you!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
?>