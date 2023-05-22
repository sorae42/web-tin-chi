<?php 
session_start();

if ($_SESSION['permission'] == 0) {
    echo "Permission denied! Bạn không có quyền truy cập trang này!";
    exit();
}

if (!isset($_GET['id'])) {
    echo "Bạn nên truy cập trang này qua trang <a href=\"/users.php\">quản lí lớp học.</a>";
    exit();
}

include "utils/db.php";
$db = new db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "utils/message.php";
    $db->query("UPDATE users SET username = ?, real_name = ?, gender = ?, hometown = ?, permission = ? WHERE id = ?", $_POST['username'], $_POST['real-name'], $_POST['gender'], $_POST['hometown'], $_POST['permission'], $_GET['id']);
    showMessage("Đã thay đổi thông tin thành công!!");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <link rel="stylesheet" href="static/style.css">
</head>

</body>
    <div class="content">
        <div class="container">
            <?php
$info = $db->query("SELECT * FROM users WHERE id = ?", $_GET['id'])->fetchArray();
            ?>
            <p>User ID: <?= $info['id'] ?></p>
            <form action="<?= $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] ?>" method="post">
                <div class="form-group">
                    <label for="username">Tên người dùng</label>
                    <input type="text" name="username" id="username" value="<?= $info['username']?>" required />
                </div>
                <div class="form-group">
                    <label for="real-name">Họ và tên</label>
                    <input type="text" name="real-name" id="real-name" value="<?= $info['real_name']?>" required />
                </div>
                <div class="form-group" style="display:block">
                    <p>Giới tính:</p>
                    <input type="radio" name="gender" id="man" value="Nam" checked required />
                    <label for="man">Nam</label>
                    <input type="radio" name="gender" id="woman" value="Nữ" <?= ($info['gender'] == 'Nữ') ? 'checked' : '' ?> required />
                    <label for="woman">Nữ</label>
                </div>
                <div class="form-group">
                    <label for="hometown">Quê Quán</label>
                    <input type="text" name="hometown" id="hometown" value="<?= $info['hometown']?>" required />
                </div>
                <div class="form-group">
                    <label for="permission">Quyền</label>
                    <select id="permission" name="permission">
                        <?php

foreach (range(0, 2) as $perm) {
    $permission = match ($perm) {
        0 => 'Sinh viên',
        1 => 'Giảng viên',
        2 => 'Quản trị viên'
    };

    $isSelect = ($perm == $info['permission']) ? 'selected' : '';
    echo "<option value=\"{$perm}\" {$isSelect}>{$permission}</option>";
};
                        ?>
                    </select>
                </div>
               
                <input type="submit" id="submit-btn" value="Thay đổi thông tin">
                <a href="users.php">
                    <button type="button">Huỷ thay đổi</button>
                </a>
            </form>

        </div>
    </div>

</body>
</html>

