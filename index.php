<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login Tia</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <form action="includes/prosesLogin.php" method="post">
            <h2>Login</h2>

            <div class="input-field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>

            <div class="input-field password-container">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
                <span class="toggle-password" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>

            <div class="forget">
                <label class="custom-checkbox">
                    <input type="checkbox" id="remember">
                    <span class="checkmark"></span>
                    Ingat Gwehj?
                </label>
                <a href="#">Lupa Sandi?</a>
            </div>

            <button type="submit">Login</button>

            <div class="register">
                <p>Belum punya akun? <a href="register.php">Daftar</a></p>
            </div>
        </form>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>