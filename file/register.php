<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi jika password dan konfirmasi password tidak sama
    if ($password !== $confirm_password) {
        $error = "Password dan konfirmasi password tidak sama!";
    } else {
        // Cek apakah username sudah ada dalam file users.txt
        $file_path = 'users.txt';

        if (!file_exists($file_path)) {
            $file = fopen($file_path, 'w'); // Buat file jika tidak ada
            fclose($file);
        }

        $file = fopen($file_path, 'r');
        $user_exists = false;

        while ($line = fgets($file)) {
            $user_data = explode(',', trim($line));
            if ($user_data[0] === $username) {
                $user_exists = true;
                break;
            }
        }
        fclose($file);

        if ($user_exists) {
            $error = "Username sudah ada. Silakan pilih username lain.";
        } else {
            // Simpan username, password plaintext, dan password hash ke file users.txt
            $file = fopen($file_path, 'a');
            fwrite($file, $username . ',' . $password . ',' . password_hash($password, PASSWORD_DEFAULT) . PHP_EOL);
            fclose($file);

            $_SESSION['registered'] = true;
            header('Location: login.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <div class="register-container">
        <h2>Registrasi</h2>

        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            <input type="submit" value="Registrasi">
        </form>
    </div>

</body>

</html>