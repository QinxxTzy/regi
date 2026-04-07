<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Dengan PHP dan MySQL</title>
    <style>
    body {
        margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif;
        background: #1a1a1a; color: #f5f5f5;
        background-image:
          repeating-linear-gradient(45deg, rgba(255,215,0,0.07) 0, rgba(255,215,0,0.07) 2px, transparent 2px, transparent 20px),
          repeating-linear-gradient(-45deg, rgba(255,215,0,0.07) 0, rgba(255,215,0,0.07) 2px, transparent 2px, transparent 20px);
        background-size: 40px 40px;
        display: flex; justify-content: center; align-items: center; height: 100vh;
    }
    .login-container { display: flex; justify-content: center; align-items: center; width: 100%; }
    .login-box {
        background: rgba(20,20,20,0.95);
        padding: 40px; border: 1px solid #b8860b; border-radius: 12px;
        width: 320px; text-align: center; box-shadow: 0 6px 18px rgba(0,0,0,0.5);
    }
    .login-box h1 { font-size: 24px; color: #ffd700; margin-bottom: 10px; text-shadow: 0 0 6px rgba(255,215,0,0.6); }
    .login-box h3 { font-size: 14px; color: #aaa; margin-bottom: 20px; }
    .login-box input {
        width: 100%; padding: 12px; margin: 8px 0;
        border: 1px solid #b8860b; border-radius: 6px; background: #111; color: #ffd700; font-size: 14px;
    }
    .login-box button {
        width: 100%; padding: 12px;
        background: linear-gradient(90deg, #2c1a4d, #5e2a84);
        border: 1px solid #b8860b; border-radius: 6px;
        color: #ffd700; font-weight: bold; cursor: pointer; margin-top: 10px; transition: 0.3s;
    }
    .login-box button:hover { background: linear-gradient(90deg, #5e2a84, #2c1a4d); transform: scale(1.05); }
    .error { color: #f44336; margin-bottom: 15px; font-size: 14px; font-weight: bold; }
    .success {
        background: #2ecc71; color: #fff; padding: 10px 20px; border-radius: 6px;
        margin: 10px 0; font-size: 14px; font-weight: bold; text-align: center;
        opacity: 0; transform: translateY(-15px); animation: fadeIn 0.6s forwards;
    }
    @keyframes fadeIn { to { opacity: 1; transform: translateY(0); } }
    .password-wrapper { position: relative; }
    .toggle-eye {
        position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
        cursor: pointer; color: #ffd700; font-size: 14px;
    }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <h3>diharapkan login terlebih dahulu</h3>

            <?php if (isset($_GET['error'])): ?>
                <p class="error">⚠️ Username atau password salah, silakan coba lagi.</p>
            <?php endif; ?>
            <?php if (isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
                <p class="success" id="logoutMsg">✅ Anda berhasil logout.</p>
            <?php endif; ?>

            <form action="login.php" method="post">        
                <input type="text" name="username" placeholder="Harap isi username" required>

                <div class="password-wrapper">
                    <input type="password" id="loginPassword" name="password" placeholder="Harap isi password" required>
                    <span class="toggle-eye" onclick="togglePassword('loginPassword', this)">👁️</span>
                </div>

                <button type="submit" name="login">Log In</button>
            </form>

            <p style="margin-top:15px; font-size:14px; color:#aaa;">
                Belum punya akun? 
                <a href="register.php" style="color:#ffd700; font-weight:bold; text-decoration:none;">
                    Register di sini
                </a>
            </p>
        </div>
    </div>

    <script>
    function togglePassword(id, el) {
        const input = document.getElementById(id);
        if (input.type === "password") {
            input.type = "text";
            el.textContent = "🙈";
        } else {
            input.type = "password";
            el.textContent = "👁️";
        }
    }
    </script>
</body>
</html>
