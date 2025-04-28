<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $class = htmlspecialchars($_POST['class']);
    $event = htmlspecialchars($_POST['event']);
    $testimony = htmlspecialchars($_POST['testimony']);
    
    // Traducem valoarea evenimentului pentru subiectul email-ului
    $eventName = ($event == "monica-pillat") ? "Întâlnirea cu Monica Pillat" : "Întâlnirea cu Ana Blandiana";
    
    $to = "theodorcrainic20@gmail.com";
    $subject = "Impresie nouă despre: " . $eventName;
    $headers = "From: website@sfsava.ro\r\n";
    $headers .= "Reply-To: noreply@sfsava.ro\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    $fullMessage = "O nouă impresie a fost trimisă prin formular:\n\n";
    $fullMessage .= "Nume: $name\n";
    $fullMessage .= "Clasa: $class\n";
    $fullMessage .= "Eveniment: $eventName\n";
    $fullMessage .= "Impresie:\n$testimony\n";
    
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo json_encode(["success" => true, "message" => "Mulțumim pentru împărtășirea impresiilor tale! Mesajul tău a fost trimis."]);
    } else {
        echo json_encode(["success" => false, "message" => "Eroare la trimiterea mesajului. Te rugăm să încerci din nou."]);
    }
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Acces interzis."]);
    exit;
}
?>