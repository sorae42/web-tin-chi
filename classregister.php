<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học phần</title>

    <link rel="stylesheet" href="static/style.css">
</head>

<body>
    <div class="content"> 
        <h1><?= ($_SESSION['permission'] == 0 ? "Đăng ký" : "Quản lý") ?> học phần</h1>
        
        <div class="container">
            <?php 
                include "utils/db.php";
                
                switch ($_SESSION['permission']) {
                    case 0:
                        include "template/classregister/student.php";
                        break;
                    case 1:
                        include "template/classregister/tutor.php";
                        break;
                    case 2:
                        include "template/classregister/admin.php";
                        break;
                    default:
                        echo "Không thể lấy dữ liệu cho bạn. Hãy liên hệ với Quản trị viên.";
                }
            ?>
        </div>
    </div>

</body>

</html>
