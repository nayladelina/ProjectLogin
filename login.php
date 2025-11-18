<?php
session_start0:
7/ Cek apakah user sudah login
if (isset ($_SESSION['username' ] )) {
header("Location: dashboard. php") ;
exit:
}
I/ Proses login saat form dikirim
1f ($_SERVER['REQUEST_ME THOD'] = 'POST') {
Susername = $_POST['username' ] ?? ': Spassword = $_POST[ ' password'] ?? ':
1/ Login sederhana (username: admin, password: 123) 1f (Susername ='admin && Spassword '123' ) €
$_SESSION['username' ] = Susername;
$_SESSION['role'] = 'Dosen':
header("Location: dashboard .php"):
exit;
} else {
SerroI = "Username atau password salah !";
}
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
</head>
<body>
    <h2>form login</h2>
    <form method="post">
        username : <input type = "text" name="username" required><br><br>
        password : <input type = "password" name="password" required><br><br>
        <button type="submit">login</button>
        <button type="reset">batal</button>
</form>
</body>
</html>
