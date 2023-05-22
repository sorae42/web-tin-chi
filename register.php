<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <link rel="stylesheet" href="static/style.css">
</head>

<body>

<?php
include 'utils/db.php';
include 'utils/message.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $db = new db();

    $usernameValidate = $db->query("SELECT * FROM users WHERE username = ?", $username);
    if (empty($username)) {
        showMessage("Đơn đăng ký không hợp lệ!");
    }
    else if ($usernameValidate->numRows() > 0) {
        showMessage("Tên người dùng này đã được đăng ký!!");
    }
    else {
        $password = $_POST['password'];
        $confirm = $_POST['password-confirm'];

        $realName = $_POST['real-name'];
        $gender = $_POST['gender'];
        $hometown = $_POST['hometown'];

        if (empty($password) || 
            empty($realName) || 
            empty($gender) || 
            empty($hometown) || 
            $password != $confirm) {
            showMessage("Đơn đăng ký không hợp lệ!");
        } else {
            $db->query("INSERT INTO users (username, password, real_name, gender, hometown) VALUES (?, ?, ?, ?, ?)", $username, $password, $realName, $gender, $hometown);
            header("Location: /?firsttime");
            exit();
        }
    }
}
?>

    <div class="content">
        <div class="container">
            <h1>Đăng ký</h1>
            <p style="color:red">Tất cả các mục đều bắt buộc!!!</p>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="username">Tên người dùng</label>
                    <input type="text" name="username" id="username" required />
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" required />
                </div>
                <div class="form-group">
                    <label for="password-confirm">Nhập lại mật khẩu</label>
                    <input type="password" name="password-confirm" id="password-confirm" required />
                </div>

                <hr />
                <div class="form-group">
                    <label for="real-name">Họ và tên</label>
                    <input type="text" name="real-name" id="real-name" required />
                </div>
                <div class="form-group" style="display:block">
                    <p>Giới tính:</p>
                    <input type="radio" name="gender" id="man" value="Nam" required />
                    <label for="man">Nam</label>
                    <input type="radio" name="gender" id="woman" value="Nữ" required />
                    <label for="woman">Nữ</label>
                </div>
                <div class="form-group">
                    <label for="hometown">Quê Quán</label>
                    <input type="text" name="hometown" id="hometown" required />
                </div>
                <input type="submit" id="submit-btn" value="Đăng ký">
            </form>
            <p>Đã có tài khoản? <a href="./index.php">Đăng nhập tại đây.</a></p>
        </div>
    </div>
</body>

</html>
