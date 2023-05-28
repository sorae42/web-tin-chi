<?php 
$db = new db();    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "utils/message.php";
    $db->query("INSERT INTO subjects(display_name, tutor_id) VALUES (?, ?)", $_POST['subject_name'], $_SESSION['userid']);
    showMessage("Đã thêm thành công!");
}
?>
<p>Hiển thị danh sách các môn của bạn</p>

<table>
    <tr>
        <th>Mã học phần (ID)</th>
        <th>Tên môn học</th>
        <th>Ngày tạo</th>
        <th />
    </tr>
    <?php 
    
    $db->query("SELECT id, display_name, created_at FROM subjects WHERE tutor_id = ?", $_SESSION['userid'])->fetchAll(function($subject) {
        echo "<tr>";
        echo "<td>{$subject['id']}</td>";
        echo "<td>{$subject['display_name']}</td>";
        echo "<td>{$subject['created_at']}</td>";
        echo "<td><a href=\"classinfo.php?id={$subject['id']}\">Xem</a></td>";
        echo "</tr>";
    });
    ?>
    <tr> 
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <td><input type="submit" value="+ Thêm" /></td>
            <td><input type="text" name="subject_name" placeholder="Tên môn học" required/></td>
            <td>Enter để thêm</td>
            <td />
        </form>
    </tr>
</table>

