<?php
$password = 'password123';
$hash = '$2y$10$Wz6WxVL3q6Tkp4UY.QvTiuwM86b/NWexyDAE0FeNaZXlJbeQG9Lxe';

if (password_verify($password, $hash)) {
    echo "Password matches the hash!";
} else {
    echo "Password does NOT match the hash.";
}
?>
