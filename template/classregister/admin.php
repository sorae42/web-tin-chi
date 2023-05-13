<?php 
session_start(); 
include "../../utils/db.php";

$db = new db();    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "utils/message.php";
    $db->query("INSERT INTO subjects(name, display_name, tutor_id) VALUES (?, ?, ?)", $_POST['sid'], $_POST['subject_name'], $_POST['userid']);
    showMessage("Đã thêm thành công!");
}
?>
<p>Hiển thị danh sách các môn có trên hệ thống</p>

<table>
    <tr>
        <th>STT (ID)</th>
        <th>sid</th>
        <th>Tên môn học</th>
        <th>Giảng viên</th>
        <th>Ngày tạo</th>
    </tr>
    <?php 
    
    $db->query("SELECT id, name, display_name, tutor_id, created_at FROM subjects")->fetchAll(function($subject) {
        
        $subDb = new db(); 
        $account = $subDb->query("SELECT real_name FROM users WHERE id = ?", $subject['tutor_id'])->fetchArray();

        echo "<tr>";
        echo "<td>{$subject['id']}</td>";
        echo "<td>{$subject['name']}</td>";
        echo "<td>{$subject['display_name']}</td>";
        echo "<td>{$account['real_name']}</td>";
        echo "<td>{$subject['created_at']}</td>";
        echo "</tr>";
    });
    ?>
    <tr> 
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <th><input type="submit" value="+ Thêm" /></th>
            <th><input type="text" name="sid" placeholder="en short name" /></th>
            <th><input type="text" name="subject_name" placeholder="Tên môn học" /></th>
            <th>Enter để thêm</th>
        </form>
    </tr>
</table>

<a href="/">Quay lại trang chủ</a>
