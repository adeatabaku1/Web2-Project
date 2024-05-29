<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Function to send email
function sendEmail($to, $subject, $message, $fromName, $fromEmail) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'teamtravel902@gmail.com';              // SMTP username
        $mail->Password   = 'nrbpzzbcxbpfucmv';                     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to

        // SSL options (if needed)
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Recipients
        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($to);               // Add a recipient
        $mail->addReplyTo($fromEmail, $fromName);

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        $mail->send();
        echo "<script>
                alert('Message was sent successfully!');
                document.location.href = 'home.php';
              </script>";
    } catch (Exception $e) {
        // Throw an exception if the email could not be sent
        throw new Exception("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}

// Check if form was submitted
if (isset($_POST["SEND"])) {
    $to = 'teamtravel902@gmail.com'; // Set your email here
    $subject = $_POST["subject"];
    $message = $_POST["body"];
    $fromName = $_POST["name"];
    $fromEmail = $_POST["email"];

    try {
        // Call the function to send email
        sendEmail($to, $subject, $message, $fromName, $fromEmail);
    } catch (Exception $e) {
        echo "<p>Ndodhi një gabim gjatë dërgimit të email-it: " . $e->getMessage() . "</p>";
        error_log($e->getMessage(), 3, 'error.log'); // Log the error
    }
}

?>

