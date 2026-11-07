<?php
// Receives the contact form, validates it, emails it, then redirects back.
session_start();

$MAIL_TO = 'lenardespayos11@gmail.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

// CSRF + honeypot spam check
$token_ok = isset($_POST['csrf'], $_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $_POST['csrf']);
if (!$token_ok || !empty($_POST['website'])) {
    http_response_code(400);
    exit('Invalid request.');
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$mobile  = trim($_POST['mobile'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];
if ($name === '' || mb_strlen($name) > 100)         $errors[] = 'Please enter your full name.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))     $errors[] = 'Please enter a valid email address.';
if ($mobile !== '' && !preg_match('/^[0-9+\-\s()]{6,20}$/', $mobile)) $errors[] = 'Mobile number looks invalid.';
if ($subject === '' || mb_strlen($subject) > 150)   $errors[] = 'Please enter a subject.';
if ($message === '' || mb_strlen($message) > 5000)  $errors[] = 'Please enter a message.';

if ($errors) {
    $_SESSION['flash'] = ['type' => 'error', 'messages' => $errors];
    $_SESSION['old']   = compact('name', 'email', 'mobile', 'subject', 'message');
    header('Location: index.php#contact');
    exit;
}

// Remove newlines from values used in mail headers (prevents header injection)
$clean = fn($s) => str_replace(["\r", "\n"], ' ', $s);

$body = "Name: {$clean($name)}\nEmail: {$clean($email)}\nMobile: {$clean($mobile)}\n\n$message";
$headers = [
    'From'         => 'no-reply@' . ($_SERVER['SERVER_NAME'] ?? 'localhost'),
    'Reply-To'     => $clean($email),
    'Content-Type' => 'text/plain; charset=UTF-8',
];
@mail($MAIL_TO, '[Portfolio] ' . $clean($subject), $body, $headers);

// Local backup copy, so messages are kept even if mail() isn't set up (e.g. XAMPP)
$dir = __DIR__ . '/storage';
if (!is_dir($dir)) mkdir($dir, 0755, true);
file_put_contents(
    $dir . '/messages.log',
    date('c') . " | $name | $email | $mobile | $subject | " . $clean($message) . PHP_EOL,
    FILE_APPEND | LOCK_EX
);

unset($_SESSION['old'], $_SESSION['csrf']);
$_SESSION['flash'] = ['type' => 'success', 'messages' => ['Thanks! Your message has been sent.']];
header('Location: index.php#contact');
exit;
