<?php
include 'config.php';
session_start();

$error = "";
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Login | Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .pixel-card {
            background: #2a2a2a;
            border: 4px solid #fff;
            box-shadow: 8px 8px 0px #555;
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }

        .pixel-title {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 2rem;
            color: #00ffcc;
        }

        .form-control {
            background: #333;
            border: 3px solid #555;
            border-radius: 0;
            color: #fff;
        }

        .form-control:focus {
            background: #444;
            border-color: #00ffcc;
            box-shadow: none;
            color: #fff;
        }

        .btn-pixel {
            background: #00ffcc;
            border: 3px solid #00886a;
            border-radius: 0;
            color: #000;
            font-weight: bold;
            box-shadow: 4px 4px 0px #005a46;
            width: 100%;
            transition: all 0.1s;
        }

        .btn-pixel:active {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0px #005a46;
        }
    </style>
</head>
<body>

<div class="pixel-card">
    <div class="pixel-title">LOGIN SYSTEM</div>
    
    <?php if($error): ?>
        <div class="alert alert-danger py-2" style="border-radius:0; font-size: 0.8rem;">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label small">USERNAME</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-4">
            <label class="form-label small">PASSWORD</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="login" class="btn btn-pixel">ENTER WORLD</button>
    </form>
</div>

</body>
</html>