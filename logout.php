<?php
session_start();      // Memulai session

// Hapus semua session
session_unset();
session_destroy();

// Kembali ke halaman login
header("Location: login.php");
exit;
?>
