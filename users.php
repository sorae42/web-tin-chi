<?php
session_start();

if ($_SESSION['permission'] != 2) {
    echo "Permission denied! Bạn không có quyền truy cập trang này!";
    exit();
}

include "utils/db.php";

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
        <h1>Danh sách người dùng</h1>
        <div class="container"> 
            <a href="/">← Quay lại trang chủ</a>
        <table>
            <tr>
                <th>STT (UID)</th>
                <th>Tên người dùng</th>
                <th>Họ tên</th>
                <th>Quyền</th>
                <th />
            </tr>
            <?php 
$db = new db();
$db->query("SELECT id, username, real_name, permission FROM users")->fetchAll(function($user) {
    $permission = match ($user['permission']) {
        0 => 'Sinh viên',
        1 => 'Giảng viên',
        2 => 'Quản trị viên'
    };

    echo "<tr>";
    echo "<td>{$user['id']}</td>"; 
    echo "<td>{$user['username']}</td>"; 
    echo "<td>{$user['real_name']}</td>"; 
    echo "<td>{$permission}</td>";
    echo "<td><a href=\"userinfo.php?id={$user['id']}\">Xem</a></td>"; 
    echo "<tr>";
});
            
            ?>
        </table> 
        </div>
    </div>
</body>
</html>
