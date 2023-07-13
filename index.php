<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['Email'];
  $query = $_POST['Query'];

  // Validate email and query
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
    exit;
  }

  // Sanitize the query field to prevent any potential security issues
  $sanitizedQuery = htmlspecialchars($query);

  $email_from = 'aryanbansal290903@gmail.com';
  $email_subject = "Contact form!";
  $email_body = "Email: $email\nQuery: $sanitizedQuery";
  $to = "bansalsharda21@gmail.com";
  $headers = "From: $email_from\r\n";

  if (mail($to, $email_subject, $email_body, $headers)) {
    header("Location: form.html");
    exit;
  } else {
    echo "Failed to send email";
  }
}
?>
