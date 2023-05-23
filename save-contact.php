<?php
// Must set this file to have permissions to create files and folders with: "CHMOD 755"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    $directory = 'submissions';
    if (!is_dir($directory)) {
        mkdir($directory);
    }

    $filename = str_replace(' ', '_', $name) . '.txt';
    $filepath = $directory . '/' . $filename;

    $content = "Name: $name\nEmail: $email\nMessage: $message\n\n";

    file_put_contents($filepath, $content);

    header('Location: thank-you.html');
    exit();
}
?>
