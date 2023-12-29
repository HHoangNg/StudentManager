<?php require_once "../login1/connect.php" ?>
<?php
if (isset($_POST["btn_sign_up"])) {
    echo "up";
    $sign_up_full_name = $_POST["sign_up_full_name"];
    $sign_up_id = $_POST["sign_up_id"];
    $sign_up_password = $_POST["sign_up_password"];
    $sign_up_phone = $_POST["sign_up_phone"];
    $sign_up_birth = $_POST["sign_up_birth"];
    $sign_up_class = $_POST["sign_up_class"];
    if ($sign_up_full_name == '' || $sign_up_id == '' || $sign_up_password == '' || $sign_up_birth == '' || $sign_up_phone == '' || $sign_up_class == '') {
        echo "<script>alert('Vui long nhap thong tin')</script>";
    } 
    else {
        if ($conn->query("INSERT INTO student(name, password, student_id, birth, phone, class) VALUES(N'$sign_up_full_name', N'$sign_up_password', N'$sign_up_id', N'$sign_up_birth', N'$sign_up_phone', N'$sign_up_class')")) {
            echo "<script>alert('Tao tai khoan thang cong')</script>";
        }
    }
}
?>