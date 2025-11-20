<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == "admin" && $pass == "1234") {
        $_SESSION['username'] = $user;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f3f4f6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .card {
        background: white;
        padding: 30px;
        width: 350px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    input {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        font-size: 14px;
    }
    button {
        width: 100%;
        padding: 12px;
        background: #2563eb;
        border: none;
        color: white;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer;
    }
    button:hover {
        background: #1e40af;
    }
</style>

</head>
<body>

<div class="card">
    <h2>Login Pengguna</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">Masuk</button>
    </form>
</div>

<?php if (!empty($error)) { ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Login Gagal!',
        text: '<?php echo $error; ?>',
        confirmButtonColor: '#2563eb'
    });
</script>
<?php } ?>

</body>
</html>
