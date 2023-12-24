<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = mysqli_connect("localhost", "root", "", "login");

    $sql = "SELECT * FROM user WHERE name = '$username' and password = '$password' ";

    $rs = mysqli_query($db, $sql);
    if(mysqli_num_rows($rs) > 0) {
        header("Location: http://localhost/StudentManager/student/student_index.html");
        
    }
    else {
        echo "login failed";
    }
?>