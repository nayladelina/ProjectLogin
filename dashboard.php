<?php
session_start 0:
I/ Cek apakah user sudah login
if (!isset ($_SESSION['username'])) {
header ("Location: login.php") :
exit;
}
?>
<! DOCTYPE html>
chtml
<head>
<title>Dashboard</title>
</head>
<body>
<h2> Selamat datang, <?php echo $_SESSION['username ']: 2>!</h2>
<?php
echo "<h2>Sel amat datang,". $_SESSION[ 'username'] . "!</h2> " ;
2>
<p>Role: <?php echo $_SESS ION[' role']: ?></p>
ca href="logout. php">Logout</a>
</body>
</html>