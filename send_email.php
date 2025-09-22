<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['Message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email address.";
        exit;
    }

    $to = "muaddhalsway@gmail.com";
    $subject = "New Contact Form Submission";

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

 if (mail($to, $subject, $message, $headers)) {
    header("Location: contact-success.html");
    exit;
} else {
    header("Location: contact-error.html");
    exit;
}
}
?>