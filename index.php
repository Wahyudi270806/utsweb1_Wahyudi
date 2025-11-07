<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login POLGAN MART</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 30px 35px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
            width: 300px;
            box-sizing: border-box;
            text-align: center;
        }
        .login-title {
            font-weight: bold;
            font-size: 20px;
            color: #2a68ff;
            margin-bottom: 25px;
            user-select: none;
        }
        label {
            display: block;
            text-align: left;
            font-size: 13px;
            margin-bottom: 6px;
            color: #222;
            user-select: none;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 16px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            background-color: #f0f4ff;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #2a68ff;
            background-color: #e6efff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px 0;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 8px;
            font-weight: 600;
            user-select: none;
            transition: background-color 0.25s ease;
        }
        .btn-login {
            background-color: #2a68ff;
            color: white;
            box-shadow: 0 1px 3px rgba(0, 38, 255, 0.45);
        }
        .btn-login:hover {
            background-color: #1c4ad9;
        }
        .btn-cancel {
            background-color: #eee;
            color: #555;
            box-shadow: none;
            margin-top: 10px;
        }
        .btn-cancel:hover {
            background-color: #ddd;
        }
        .footer {
            margin-top: 18px;
            font-size: 11px;
            color: #999;
            user-select: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-title">POLGAN MART</div>
        <form method="POST" action="process_login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="admin" required autocomplete="off" />
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="•••" required autocomplete="off" />
            <button type="submit" class="btn-login">Login</button>
            <button type="reset" class="btn-cancel">Batal</button>
        </form>
        <div class="footer">© 2025 POLGAN MART</div>
    </div>
</body>
</html>
