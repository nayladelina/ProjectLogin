<?php
session_start();
session_destroy();     // hapus session
header("Location: index.php");
exit;
