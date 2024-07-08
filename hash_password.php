<?php

$password = 'adminpassword';  // password asli
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
echo $hashedPassword;
