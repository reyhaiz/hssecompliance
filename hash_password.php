<?php

$password = 'adminpassword123';  // password asli
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
echo $hashedPassword;