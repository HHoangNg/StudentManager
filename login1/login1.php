<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="icon" href="../image/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    <form action="" class="login_form" method="post" role="form">
        <h1>ĐĂNG NHẬP</h1>
        <h3>Tên đăng nhập:</h3>
        <input type="text" placeholder="Nhập tên đăng nhập" id="login_name" name="student_id">
        <h3>Mật khẩu:</h3>
        <input type="text" placeholder="Nhập mật khẩu" id="login_passWd" name="student_password">
        <button id="btn_login" type="submit" name="btn_login1">Đồng ý</button>
    </form>
        
        
    
    <img src="../image/body_intro/intro7.JPG" alt="">
    <a href="../index.html" style="text-decoration: none; color: black; font-size: larger; background-color: #ffd83f; font-size: 31px; border: 2px black solid; border-radius: 10px; cursor: pointer;">Trang chủ</a>
    
    <?php require_once "connect.php"?>
    <?php
        session_start();
        
        if (isset($_POST['btn_login1'])) {
            $student_id = $_POST['student_id'];
            $student_password = $_POST['student_password'];
        
            $sql = "SELECT * FROM student WHERE student_id = '$student_id' and password = '$student_password' ";
        
            $result = $conn->query($sql);
            
            if ($result->num_rows === 1) {
                if($row = $result->fetch_assoc()) {
                    $_SESSION['user_id'] = $row['student_id'];
                }
               
                header("Location: http://localhost/StudentManager/student/student_index.php");
                
            } else {
                echo "<script>alert('Vui long nhap lai')</script>";
            }
        
            $conn->close();
        }
    ?>
</body>
</html>