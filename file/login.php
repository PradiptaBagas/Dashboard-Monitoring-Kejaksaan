<?php
session_start();

// hanya untuk login orang pidsus
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     if ($username === 'kejari' && $password === 'pidsus123') {
//         $_SESSION['loggedin'] = true;
//         header('Location: index.php');
//         exit;
//     } else {
//         $error = "Salah ya ges ya";
//     }
// }
// hanya untuk login orang pidsus

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buka file users.txt untuk membaca
    $file_path = 'users.txt';
    if (file_exists($file_path)) {
        $file = fopen($file_path, 'r');
        $user_found = false;
        $correct_password = false;

        while ($line = fgets($file)) {
            $user_data = explode(',', trim($line));

            // Cek apakah username ditemukan
            if ($user_data[0] === $username) {
                $user_found = true;

                // Verifikasi password dengan password hash (kolom ke-3)
                if (password_verify($password, $user_data[2])) {
                    $correct_password = true;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header('Location: index.php');
                    exit;
                }
                break;
            }
        }
        fclose($file);

        if (!$user_found) {
            $error = "Username tidak ditemukan.";
        } elseif (!$correct_password) {
            $error = "Password salah.";
        }
    } else {
        $error = "File users.txt tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="login-container">
        <h2>LOGIN</h2>

        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>