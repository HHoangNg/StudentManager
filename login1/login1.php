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
        <div style="display: flex; gap: 30px;">
            <h2 id="student_choice">Học sinh</h2>
            <h2 id="teacher_choice">Giáo viên</h2>
        </div>
        
        <h3>Tên đăng nhập:</h3>
        <input type="text" placeholder="Nhập tên đăng nhập" id="login_name" name="login_id">
        <h3>Mật khẩu:</h3>
        <input type="text" placeholder="Nhập mật khẩu" id="login_passWd" name="login_password">
        <button id="btn_login" type="submit" name="btn_login1">Đồng ý</button>
    </form>
    <img src="../image/body_intro/intro7.JPG" alt="">
    <a href="../index.html" style="text-decoration: none; color: black; font-size: larger; background-color: #ffd83f; font-size: 31px; border: 2px black solid; border-radius: 10px; cursor: pointer;">Trang chủ</a>
    
    <?php require_once "connect.php"?>
    <?php
        session_start();
        
        if (isset($_POST['btn_login1'])) {
            // học sinh đăng nhập
            $login_id = $_POST['login_id'];
            $login_password = $_POST['login_password'];
            $sql = "SELECT * FROM student WHERE student_id = '$login_id' and password = '$login_password' ";
            $result = $conn->query($sql);
            if ($result->num_rows === 1) {
                if($row = $result->fetch_assoc()) {
                    $_SESSION['user_id'] = $row['student_id'];
                }
                header("Location: http://localhost/StudentManager/student/student_index.php");
            }
            else if($login_id == '' || $login_password == '') {
                echo "<script>alert('Vui lòng điền đủ thông tin')</script>";
            }
            else {
                echo "<script>alert('Sai mã học sinh hoặc mật khẩu')</script>";
            }
            $conn->close();
        }
    ?>
    <script>
        let btn_login = document.getElementById("btn_login")
        let login_form = document.getElementsByClassName("login_form")
        let student_choice = document.getElementById("student_choice")
        let teacher_choice = document.getElementById("teacher_choice")
        // đổi màu nút học sinh giáo viên khi click
        student_choice.addEventListener("click", () => {
            student_choice.style.backgroundColor = "#ffd83f"
            student_choice.style.border = "1px black solid"
            student_choice.style.borderRadius = "8px"
            teacher_choice.style.backgroundColor = "#ff8e51"
            teacher_choice.style.border = "0px"
            teacher_choice.style.borderRadius = "0px"
        })
        teacher_choice.addEventListener("click", () => {
            teacher_choice.style.backgroundColor = "#ffd83f"
            teacher_choice.style.border = "1px black solid"
            teacher_choice.style.borderRadius = "8px"
            student_choice.style.backgroundColor = "#ff8e51"
            student_choice.style.border = "0px"
            student_choice.style.borderRadius = "0px"
            login_form[0].action = "teacher_login.php"
        })
    </script>
</body>
</html>