<?php
session_start();

// Jika sudah login, redirect ke dashboard.php
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";
$username_input = "";

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['batal'])) {
        // Tombol Batal ditekan
        $username_input = "";
        $error = "";
    } else {
        $username_input = $_POST['username'] ?? '';
        $password_input = $_POST['password'] ?? '';

        // Data statis
        $valid_user = 'admin';
        $valid_pass = '1234';

        if ($username_input === $valid_user && $password_input === $valid_pass) {
            $_SESSION['username'] = $username_input;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login POLGAN MART</title>
    <style>
        /* Gaya sesuai contoh gambar */
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f2f5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-box {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
            width: 320px;
            box-sizing: border-box;
        }
        .login-title {
            font-weight: bold;
            font-size: 22px;
            color: #2a68ff;
            text-align: center;
            margin-bottom: 20px;
            user-select: none;
        }
        .input-label {
            font-size: 12px;
            color: #555;
            margin: 10px 0 5px;
            display: block;
            user-select: none;
        }
        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f0f4ff;
            box-sizing: border-box;
        }
        input[type="text"]:focus, 
        input[type="password"]:focus {
            outline: none;
            border-color: #2a68ff;
            background-color: #e6efff;
        }
        .btn-login {
            margin-top: 20px;
            width: 100%;
            padding: 10px 0;
            background-color: #2a68ff;
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 1px 3px rgb(0 38 255 / 45%);
            transition: background-color 0.3s ease;
            user-select: none;
        }
        .btn-login:hover {
            background-color: #1e49d2;
        }
        .btn-batal {
            margin-top: 8px;
            width: 100%;
            padding: 8px 0;
            background-color: #eee;
            border: none;
            border-radius: 6px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            box-shadow: none;
            transition: background-color 0.3s ease;
            user-select: none;
        }
        .btn-batal:hover {
            background-color: #ddd;
        }
        .error-message {
            background-color: #ffdddd;
            color: #cc0000;
            font-size: 13px;
            padding: 8px 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            user-select: none;
        }
        .footer {
            font-size: 11px;
            color: #999;
            text-align: center;
            margin-top: 18px;
            user-select: none;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="login-title">POLGAN MART</div>

        <?php if ($error): ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label class="input-label" for="username">Username</label>
            <input 
                type="text" 
                name="username" 
                id="username" 
                required 
                autocomplete="off" 
                value="<?= htmlspecialchars($username_input) ?>" 
            />
            <label class="input-label" for="password">Password</label>
            <input type="password" name="password" id="password" required autocomplete="off" />

            <button type="submit" class="btn-login">Login</button>
            <button type="submit" name="batal" class="btn-batal">Batal</button>
        </form>
        <div class="footer">© 2025 POLGAN MART</div>
    </div>
</body>
</html>
