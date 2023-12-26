<?php require_once "../login1/connect.php"?>
<?php
    if(isset($_POST["btn_sign_up"])) {
        $sign_up_full_name = $_POST["sign_up_full_name"];
        $sign_up_id = $_POST["sign_up_id"];
        $sign_up_password = $_POST["sign_up_password"];

        if($conn->query("INSERT INTO users(name, password, stu_id) VALUES(N'$sign_up_full_name', N'$sign_up_password', N'$sign_up_id')")) {
            echo "<script>alert('them thong cong')</script>";
        }
        else {
            echo "<script>alert('Dang ky that bai')</script>";
        }
    }
?>