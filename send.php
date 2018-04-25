<?php 
// Form variables 
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$massage = $_POST['massage'];

    
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer;                            // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'smtpforwebsites@gmail.com';                 // SMTP username
    $mail->Password = 'smtpforwebsite';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('versefriet@picklesenmayo.nl');     // Add a recipient

    //body content
    $body =  'Er is een mail verstuurd vanaf picklesenmayo.nl door: ' . $name . '. <br><br>Het volgende bericht is ingevuld:<br><br>' . $massage . '. <br><br><br> <strong>Neem contact op met: ' . $name . '</strong><br>Telefoonnummer: ' .$number . '<br>E-mailadres: ' . $email;

    //Content
    $mail->isHTML(true);                                   // Set email format to HTML
    $mail->Subject = 'picklesenmayo.nl mail van ' . $name;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
    $_POST['massage_send'] = 'true'; 
    header('Location: index.php');
    die();
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    $_POST['massage_send'] = 'false';
    header('Location: index.php');
    die();
}
?>




