<?require_once "connect.php"?>;
<?php
$student_name = $_POST['student_name'];
$student_password = $_POST['student_password'];
if (isset($_POST['btn_login1'])) {
    

    $sql = "SELECT * FROM user WHERE name = '$student_name' and password = '$student_password' ";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        header("Location:http://localhost/StudentManager/student/student_index.php");
        
    } else {
        echo "login failed";
    }

    $conn->close();
}

?>