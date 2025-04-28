<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "theodorcrainic20@gmail.com";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    $fullMessage = "Ați primit un nou mesaj de la formularul de contact:\n\n";
    $fullMessage .= "Nume: $name\n";
    $fullMessage .= "Email: $email\n";
    $fullMessage .= "Subiect: $subject\n";
    $fullMessage .= "Mesaj:\n$message\n";
    
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Mesaj trimis cu succes!";
    } else {
        echo "Eroare la trimiterea mesajului. Te rugăm să încerci din nou.";
    }
} else {
    echo "Acces interzis.";
}
?>