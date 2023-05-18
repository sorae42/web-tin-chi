<?php
$db = new db();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    include "utils/message.php";
    if (isset($_GET['leaveclass']))
        $db->query("DELETE FROM registered WHERE users_id = ? AND subject_id = ?", $_SESSION['userid'], $_GET['id']);
    else 
        $db->query("INSERT INTO registered(users_id, subject_id) VALUES (?, ?)", $_SESSION['userid'], $_GET['id']);
    showMessage("Thành công!!");
}
?>

<p>Đăng ký lớp học</p>

<table>
    <tr>
        <th>STT (ID)</th>
        <th>Tên môn học</th>
        <th>Giảng viên</th>
        <th />
    </tr>
    <?php 
    
    $db->query("SELECT id, display_name, tutor_id FROM subjects")->fetchAll(function($subject) {
        $subDb = new db();
        $account = $subDb->query("SELECT real_name FROM users WHERE id = ?", $subject['tutor_id'])->fetchArray();

        // this look ugly as hell 
        $isRegistered = count($subDb->query("SELECT * FROM registered WHERE users_id = ? AND subject_id = ?", $_SESSION['userid'], $subject['id'])->fetchArray()) > 0 ? "1" : "0";
        
        if ($isRegistered) 
            echo "<tr style=\"background-color:lightblue\">"; 
        else 
            echo "<tr>";
        
        echo "<td>{$subject['id']}</td>";
        echo "<td>{$subject['display_name']}</td>";
        echo "<td>{$account['real_name']}</td>";

        if ($isRegistered)
            echo "<td><a href=\"?id={$subject['id']}&leaveclass\">Huỷ Đăng ký</a></td>";
        else 
            echo "<td><a href=\"?id={$subject['id']}\">Đăng ký</a></td>";
        echo "</tr>";
    });
    ?>
</table>
