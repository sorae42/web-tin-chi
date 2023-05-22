<?php 
$db = new db();    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "utils/message.php";
    $db->query("INSERT INTO subjects(display_name, tutor_id) VALUES (?, ?)", $_POST['subject_name'], $_POST['userid']);
    showMessage("Đã thêm thành công!");
}
?>
<p>Hiển thị danh sách các môn có trên hệ thống</p>

<table>
    <tr>
        <th>Mã học phần (ID)</th>
        <th>Tên môn học</th>
        <th>Giảng viên</th>
        <th>Ngày tạo</th>
        <th />
    </tr>
    <?php 
    
    $db->query("SELECT id, display_name, tutor_id, created_at FROM subjects")->fetchAll(function($subject) {
        
        $subDb = new db(); 
        $account = $subDb->query("SELECT real_name FROM users WHERE id = ?", $subject['tutor_id'])->fetchArray();

        echo "<tr>";
        echo "<td>{$subject['id']}</td>";
        echo "<td>{$subject['display_name']}</td>";
        echo "<td>{$account['real_name']}</td>";
        echo "<td>{$subject['created_at']}</td>";
        echo "<td><a href=\"/classinfo.php?id={$subject['id']}\">Xem</a></td>";
        echo "</tr>";
    });
    ?>
    <tr> 
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <td><input type="submit" value="+ Thêm" /></td>
            <td><input type="text" name="subject_name" placeholder="Tên môn học" required /></td>
            <td>
                <select name="userid" id="userid">
                    <?php 
                    $db->query("SELECT id, real_name FROM users WHERE permission BETWEEN 1 AND 2")->fetchAll(function($user) {
                        echo "<option value={$user['id']}>{$user['real_name']}</option>";
                    });
                    ?>
                </select>
            </td>
            <td>Enter để thêm</td>
            <td />
        </form>
    </tr>
</table>

