<?php
$adminPassword = 'Lewisrecipehub'; 

// Generate the password hash
$hashedPassword = password_hash($adminPassword, PASSWORD_BCRYPT);

echo "Hashed Password: " . $hashedPassword;
?>
