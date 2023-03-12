<?php
// Validate form inputs
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$profile_pic = $_FILES['profile_pic'];

if (empty($name) || empty($email) || empty($password) || empty($profile_pic)) {
  die('All fields are required.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die('Invalid email format.');
}


$uploads_dir = 'uploads/';
$filename = uniqid() . '_' . $profile_pic['name'];
move_uploaded_file($profile_pic['tmp_name'], $uploads_dir . $filename);


$user_info = [$name, $email, $filename, date('Y-m-d H:i:s')];
$file = fopen('users.csv', 'a');
fputcsv($file, $user_info);
fclose($file);


session_start();
setcookie('user_name', $name);


header('Location: form.html');
exit;
?>
