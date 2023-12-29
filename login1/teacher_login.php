<?php require_once "connect.php"?>
<?php
    session_start();
    if(isset($_POST['btn_login1'])) {
        $login_id = $_POST["login_id"];
        $login_password = $_POST["login_password"];
        $sql = "SELECT * FROM teacher WHERE teacher_id = '$login_id' and password = '$login_password'";
        $result = $conn->query($sql);
        if($result->num_rows === 1) {
            if($row = $result->fetch_assoc()) {
                $_SESSION['user_id'] = $row['teacher_id'];
            }
            header("Location: http://localhost/StudentManager/teacher/teacher_index.php");
        }
        else if($login_id == '' || $login_password == '') {
            echo "<script>alert('Vui lòng điền đủ thông tin')</script>";
        }
        else {
            echo "<script>alert('Sai mã giáo viên hoặc mật khẩu')</script>";
        }
        $conn->close();
    }
?>
