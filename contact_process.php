<?php
//user posted variables
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

//php mailer variables
$to = get_option('admin_email');
$subject = $subject . "Someone sent a message from " . get_bloginfo('name');
$headers = 'From: ' . $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

$sent = wp_mail($to, $subject, strip_tags($message), $headers);