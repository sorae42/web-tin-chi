<?php
session_start();

if (!isset($_SESSION['permission']) || $_SESSION['permission'] == 0) {
    echo "Permission denied!! Bạn không thể truy cập được trang này.";
    exit();
}

if (empty($_GET['id'])) {
    echo "Parameter needed!! Bạn nên truy cập trang này qua trang <a href=\"/classregister.php\">quản lí lớp học.</a>";
    exit();
}

include "utils/db.php";

$db = new db();
$registeredStudent = array();

if (isset($_GET['deleteclass'])) {
    $db->query("DELETE FROM registered WHERE subject_id = ?", $_GET['id']);
    $db->query("DELETE FROM subjects WHERE id = ?", $_GET['id']);

    $db->close();
    header("Location: /classregister.php?deletesuccess");
    exit();
}

if (isset($_GET['deletestudent'])) {
    $db->query("DELETE FROM registered WHERE users_id = ?", $_GET['uid']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db->query("INSERT INTO registered(users_id, subject_id) VALUES (?, ?)", $_POST['student-id'], $_GET['id']);
}

$subjectInfo = $db->query("SELECT display_name, tutor_id, created_at FROM subjects WHERE id = ?", $_GET['id'])->fetchArray();

if (count($subjectInfo) == 0) {
    echo "Lớp này không tồn tại, bạn chắc là bạn nhập đúng ID của lớp không?";
    exit();
}

$account = $db->query("SELECT real_name FROM users WHERE id = ?", $subjectInfo['tutor_id'])->fetchArray();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiét học phần</title>

    <link rel="stylesheet" href="static/style.css">
</head>

<body>
    <div class="content">
        <h1>Chi tiết học phần</h1>
        <div class="container">
            <a href="classregister.php">← Quay về trang trước</a>

            <p>Tên môn học: <?= $subjectInfo['display_name'] ?> (Mã học phần: <?= $_GET['id'] ?>)</p>
            <p>Giảng viên: <?= $account['real_name'] ?> (UID: <?= $subjectInfo['tutor_id'] ?>)</p>
            <p>Ngày tạo: <?= $subjectInfo['created_at'] ?></p>
            <a href="?id=<?= $_GET['id'] ?>&deleteclass">
                <button type="button" class="warning">Xoá lớp này</button>
            </a>
            <p>Danh sách các sinh viên đã đăng ký lớp này</p>

            <table>
                <tr>
                    <th>STT (UID)</th>
                    <th>Tên sinh viên</th>
                    <th>Thời gian đăng ký</th>
                    <th />
                </tr>
                <tr>
                    <?php
$db->query("SELECT users_id, registered_on FROM registered WHERE subject_id = ?", $_GET['id'])->fetchAll(function($user) use ($registeredStudent) {
    $subDb = new db(); 
    $account = $subDb->query("SELECT real_name FROM users WHERE id = ?", $user['users_id'])->fetchArray();
    // TODO: pass registeredStudent to the outer scope
    //array_push($registeredStudent, $user['users_id']);

    echo "<tr>";
    echo "<td>{$user['users_id']}</td>";
    echo "<td>{$account['real_name']}</td>";
    echo "<td>{$user['registered_on']}</td>";
    echo "<td><a href=\"?id={$_GET['id']}&uid={$user['users_id']}&deletestudent\">Xoá</a></td>";
    echo "</tr>";
});
                    ?>
                </tr>
                <tr>
                    <form action="<?= $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] ?>" method="post">
                        <td><input type="submit" value="+ Thêm" /></td>
                        <td>
                            <input type="text" name="student-id" list="students" placeholder="Tên sinh viên" required />
                            <datalist id="students">
                                <?php
$db->query("SELECT id, real_name FROM users WHERE permission = 0")->fetchAll(function($user) use ($registeredStudent) {
    //if (!in_array($user['id'], $registeredStudent))
        echo "<option value={$user['id']}>{$user['real_name']}</option>";
});
                                ?>
                            </datalist>
                        </td>
                        <td />
                        <td />
                    </form>
                </tr>
            <table>
        </div>
    </div>
</body>

</html>


