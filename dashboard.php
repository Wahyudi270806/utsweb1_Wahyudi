<?php
session_start();

// Redirect ke login jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard POLGAN MART</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            text-align: center;
            margin-top: 100px;
            user-select: none;
        }
        h1 {
            color: #2a68ff;
            margin-bottom: 25px;
            font-weight: 700;
        }
        .welcome {
            font-size: 18px;
            margin-bottom: 40px;
            font-weight: 600;
        }
        form button {
            background-color: #dc3545;
            border: none;
            padding: 12px 28px;
            font-size: 16px;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 2px 8px rgba(220,53,69,0.4);
            user-select: none;
        }
        form button:hover {
            background-color: #b42b2f;
        }
    </style>
</head>
<body>

    <h1>Dashboard</h1>
    <div class="welcome">
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>!
    </div>

    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>

</body>
</html>
