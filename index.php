<?php
session_start();
include 'utils/message.php';

$isLoggedIn = isset($_SESSION['loggedIn']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($isLoggedIn) ? "Hồ sơ của bạn" : "Đăng nhập" ?></title>

    <link rel="stylesheet" href="static/style.css?">
</head>

<body>

    <div class="content">
    <?php
        if (isset($_GET['firsttime'])) {
            showMessage("✅ Đã tạo tài khoản thành công.");
        }
        
        if ($isLoggedIn) {
            include 'template/account.php';
        } else {
            include 'template/login.php';
        }
    ?>
    </div>
</body>

</html>
