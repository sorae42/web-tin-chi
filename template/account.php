<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $username = $_SESSION['name'];
    $password = $_POST['password'];
    $confirm = $_POST['password-confirm'];
    
    include 'utils/db.php';

    if (empty($password) || $password != $confirm) {
        showMessage("Mật khẩu không trùng khớp!!");
    } else {
        $db = new db();
        $db->query("UPDATE users SET password = ? WHERE username = ?", $password, $username);
        $db->close();
        showMessage("Đổi mật khẩu thành công!");
    }
}

$permission = match ($_SESSION['permission']) {
    0 => 'Sinh viên',
    1 => 'Giảng viên',
    2 => 'Quản trị viên'
};
?>

<div class="container">
    <h2>Xin chào,
        <?= $_SESSION['displayName'] ?>!
    </h2>

    <p>Bạn là <?= $permission ?>!</p> 

    <a href="classregister.php">
        <button>
            <?= ($_SESSION['permission'] == 0 ? "Đăng ký" : "Quản lý") ?> học phần
        </button>
    </a> 

    <p>Bạn có thể đổi mật khẩu tài khoản tại đây</p>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required />
        </div>
        <div class="form-group">
            <label for="password-confirm">Nhập lại mật khẩu</label>
            <input type="password" name="password-confirm" id="password-confirm" required />
        </div>
        <input type="submit" id="submit-btn" value="Đổi mật khẩu" />
    </form>

    <a href="/logout.php">
        <button>Đăng xuất tài khoản</button>
    </a>

</div>
