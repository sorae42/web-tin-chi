<?php
include 'utils/db.php';
$db = new db();

$userid = $_SESSION['userid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['infochange'])) {
        $db->query("UPDATE users SET real_name = ?, gender = ?, hometown = ? WHERE id = ?", 
        $_POST['real-name'], $_POST['gender'], $_POST['hometown'], $userid);
        showMessage("Đổi thông tin thành công!");
    }

    if (isset($_POST['passwordchange'])) {
        $password = $_POST['password'];
        $confirm = $_POST['password-confirm'];
        
        if (empty($password) || $password != $confirm) {
            showMessage("Mật khẩu không trùng khớp!!");
        } else {
            $db->query("UPDATE users SET password = ? WHERE id = ?", $password, $userid);
            showMessage("Đổi mật khẩu thành công!");
        }
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

    <p>User ID: <?= $_SESSION['userid'] ?></p>

    <p>Bạn là <?= $permission ?>!</p> 

    <?php if ($_SESSION['permission'] == 2): ?>
    <a href="users.php">
        <button>Quản lí người dùng</button>
    </a>
    <?php endif; ?>

    <a href="classregister.php">
        <button>
            <?= ($_SESSION['permission'] == 0 ? "Đăng ký" : "Quản lý") ?> học phần
        </button>
    </a>

    <hr />
    <h3>Thay đổi thông tin cá nhân</h3>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <?php 
$info = $db->query("SELECT real_name, gender, hometown FROM users WHERE id = ?", $userid)->fetchArray();
        ?>
        <div class="form-group">
            <label for="real-name">Họ và tên</label>
            <input type="text" name="real-name" id="real-name" value="<?= $info['real_name'] ?>" required />
        </div>
        <div class="form-group" style="display:block">
            <p>Giới tính:</p>
            <input type="radio" name="gender" id="man" value="Nam" checked required />
            <label for="man">Nam</label>
            <input type="radio" name="gender" id="woman" value="Nữ" <?= ($info['gender'] == 'Nữ') ? 'checked' : '' ?> required />
            <label for="woman">Nữ</label>
        </div>

        <div class="form-group">
            <label for="hometown">Quê quán</label>
            <input type="text" name="hometown" id="hometown" value="<?= $info['hometown'] ?>" required />
        </div>
        <input type="submit" id="submit-btn" value="Đổi thông tin" name="infochange"/>
    </form>

    <hr />
    <h3>Thay đổi mật khẩu</h3>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required />
        </div>
        <div class="form-group">
            <label for="password-confirm">Nhập lại mật khẩu</label>
            <input type="password" name="password-confirm" id="password-confirm" required />
        </div>
        <input type="submit" id="submit-btn" value="Đổi mật khẩu" name="passwordchange"/>
    </form>

    <a href="logout.php">
        <button>Đăng xuất tài khoản</button>
    </a>

</div>
