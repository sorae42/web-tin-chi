<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'utils/db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        showMessage("Không đầy đủ thông tin nhập!");
    } else {
        $db = new db();
        $account = $db->query("SELECT * FROM users WHERE username = ? AND password = ?", $username, $password)->fetchArray();
        if (sizeof($account) <= 0) {
            showMessage("Không tồn tại người dùng này.");
        }
        else {
            session_regenerate_id();
            $_SESSION['loggedIn'] = true;
            $_SESSION['name'] = $username;
            $_SESSION['userid'] = $account['id'];
            $_SESSION['displayName'] = $account['real_name'];
            $_SESSION['permission'] = $account['permission'];
            header("Location: /");
            exit();
        }

        $db->close();
    }
}
?>

<div class="container">
    <h1>Đăng nhập</h1>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="username">Tên người dùng</label>
            <input type="text" name="username" id="username" required />
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required />
        </div>
        <input type="submit" id="submit-btn" value="Đăng nhập">
    </form>
    <p>Chưa có tài khoản? <a href="./register.php">Đăng ký tại đây.</a></p>
</div>
