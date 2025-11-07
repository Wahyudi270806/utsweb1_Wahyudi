<?php
session_start();

// Hapus session semua data login
session_destroy();

// Redirect ke halaman login
header("Location: index.php");
exit();
?>
