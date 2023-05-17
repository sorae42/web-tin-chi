<?php 
session_start(); 
include "../../utils/db.php";

$db = new db();    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "utils/message.php";
    $db->query("INSERT INTO subjects(name, display_name, tutor_id) VALUES (?, ?, ?)", $_POST['sid'], $_POST['subject_name'], $_SESSION['userid']);
    showMessage("Đã thêm thành công!");
}
?>
<p>Hiển thị danh sách các môn của bạn</p>

<table>
    <tr>
        <th>STT (ID)</th>
        <th>sid</th>
        <th>Tên môn học</th>
        <th>Ngày tạo</th>
    </tr>
    <?php 
    
    $db->query("SELECT id, display_name, created_at FROM subjects WHERE tutor_id = ?", $_SESSION['userid'])->fetchAll(function($subject) {
        echo "<tr>";
        echo "<td>{$subject['id']}</td>";
        echo "<td>{$subject['display_name']}</td>";
        echo "<td>{$subject['created_at']}</td>";
        echo "</tr>";
    });
    ?>
    <tr> 
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <td><input type="submit" value="+ Thêm" /></td>
            <td><input type="text" name="subject_name" placeholder="Tên môn học" required/></td>
            <td />
            <td>Enter để thêm</td>
        </form>
    </tr>
</table>

